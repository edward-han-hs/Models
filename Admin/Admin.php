<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name', 'phone', 'username', 'password', 'password_update_log', 'staff_id', 'role_id', 'department_id', 'remember_token'
    ];

    protected $hidden = [
        'password',
        'password_update_log'
    ];

    protected $developerID = [1];
    protected $developerRoleID = 1;             // 开发者角色


    # ================================================================================
    #  获取后台用户关联信息的方法
    # ================================================================================

    // 获取当前用户对应的职员信息
    public function staffInfo()
    {
        if (!isset($this->staff)) {
            $this->staff = AdminStaff::where('id', $this->staff_id)->first();
        }

        return $this->staff;
    }

    // 获取当前用户对应角色
    public function roleInfo()
    {
        if (!isset($this->role)) {
            $this->staffInfo();
            if (in_array($this->id, $this->developerID)) {
                $this->role = AdminRole::where('id', $this->developerRoleID)->first();
                return $this->role;
            }
            $this->role = AdminRole::where('id', $this->staff->role_id)->first();
            $this->authorized_menus = empty($this->authorized_menus) ? [] : explode(',', $this->authorized_menus);
            $this->authorized_powers = empty($this->authorized_powers) ? [] : explode(',', $this->authorized_powers);

        }

        return $this->role;
    }

    // 获取当前用户对应的部门信息
    public function departmentInfo()
    {
        if (!isset($this->department)) {
            $this->roleInfo();
            $this->department = AdminDepartment::where('id', $this->role->department_id)->first();
            $this->department->index = empty($this->department->parent_list) ? $this->department->id : $this->department->parent_list.",{$this->department->id}";
        }

        return $this->department;
    }

    public function powerInfo()
    {

    }

    // 判断当前用户是否为开发者
    public function isDeveloper()
    {
        return in_array($this->id, $this->developerID);
    }

    public function manageAuthority()
    {
        $isDeveloper = $this->isDeveloper();
        $isManage = !empty($this->roleInfo()) && $this->role->manage == 1 ? true : false;
        $department = $this->departmentInfo();
        $role = $this->roleInfo();
        return [$isDeveloper, $isManage, $department, $role];
    }

    // 获取当前用户的权限信息
    public function authorizes()
    {
        if ($this->isDeveloper()) {
            $menus = AdminMenu::orderBy('sort', 'desc')->orderBy('id', 'asc')->get()->toArray();
            $powers = AdminPower::all()->toArray();
        } else {
            $staff = $this->staffInfo();
            if ($staff) {
                $role = $this->roleInfo();
                $powerIDs = empty($role['authorized_powers']) ? array() : $role['authorized_powers'];
                if (empty($role['authorized_menus'])) {
                    $menus = array();
                } else {
                    $menus = AdminMenu::whereIn('id', explode(',', $role['authorized_menus']))->where('module_id', '<>', 1)->orderBy('sort', 'desc')->orderBy('id', 'asc')->get()->toArray();
                }
                if (empty($role['authorized_powers'])) {
                    $powers = array();
                } else {
                    $powers = AdminMenu::whereIn('id', explode(',', $role['authorized_powers']))->orderBy('sort', 'desc')->orderBy('id', 'asc')->get()->toArray();
                }
            } else {
                $menus = array();
                $powers = array();
            }
        }
        if (count($menus) > 0) {
            $moduleIDs = array();
            foreach ($menus as $value) {
                if (!in_array($value['module_id'], $moduleIDs)) {
                    $moduleIDs[] = $value['module_id'];
                }
            }
            $modules = AdminModule::select()->where('status', 1)->whereIn('id', $moduleIDs)->get()->toArray();
        } else {
            $modules = [];
        }

        return [
          'modules' => $modules,
          'menus' => $menus,
          'powers' => $powers,
        ];
    }





    # ================================================================================
    #  权限校验及权限相关方法
    # ================================================================================

    /**
     * 验证当前用户是否拥有某个权限
     * @param  string   $power 指定要验证的权限标识
     * @return boolean
     */
    public function possessPower($power)
    {
        if (in_array($this->id, $this->developerID)) {//判断账号类型
            return true;
        } elseif($this->roleInfo()->authorized_powers) {
            $role = $this->roleInfo();
            if(AdminPower::where('label', $power)->whereIn('id', explode(',', $role->authorized_powers))->first()){
                return true;
            }
        }
        return false;
    }

    /**
     * 验证指定用户是否拥有指定权限
     * @param  string  $power   指定要验证的权限标识
     * @param  integer $user_id 指定需要验证权限的用户ID（默认为0，即当前用户）
     * @return boolean
     */
    public static function checkPower($power, $user_id = 0)
    {
        if ($user_id > 0) {
            $user = self::find($user_id);
            if ($user) {
                return $user->possessPower($power);
            } else {
                return false;
            }
        } else {
            return \Auth::guard('admin')->user()->possessPower($power);
        }
    }

    public function staff()
    {
        return $this->hasOne(AdminStaff::class,'id','staff_id');
    }
    public function role()
    {
        return $this->hasOne(AdminRole::class,'id','role_id');
    }
    public function department()
    {
        return $this->hasOne(AdminDepartment::class,'id','department_id');
    }
}
