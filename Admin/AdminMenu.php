<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminMenu extends Model
{
    use SoftDeletes;
    
    protected  $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    /**
     * 根据 "用户权限" 和 "后台模块" 来获取菜单信息.
     *
     * @param Admin $user     admin 对象
     * @param array $moduleID 模块ID
     *
     * @return array 后台菜单
     */
    public static function getMenusByAuthAndModules(Admin $user, array $modules)
    {
        $moduleIDs = array();
        foreach ($modules as $key => $value) {
            $moduleIDs[] = $value['id'];
        }
        $list = self::whereIn('module_id', $moduleIDs)
        ->orderBy('parent_id', 'asc')
        ->orderBy('sort', 'desc')
        ->orderBy('id', 'asc')
        ->get()->toArray();
        $menus = self::tree($list);

        return $menus;
    }

    public static function tree($list, $parent_id = 0)
    {
        $res = array();
        foreach ($list as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                $value['children'] = self::tree($list, $value['id']);
                $res[] = $value;
            }
        }

        return $res;
    }

    public static function sort($list, $parent_id = 0, $res = [])
    {

        foreach ($list as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                $res[] = $value;
                $res = self::sort($list, $value['id'], $res);
            }
        }

        return $res;
    }

}
