<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable, BeasModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'sex',
        'is_user_from_singpass',
        'phone_dial_code',
        'phone_number',
        'singpass_unique_id',
        'user_account_status',
        'register_status',
        'has_two_years_driving_experience',
        'has_agreed_terms_and_condtions',
        'has_allowed_promo_contacting',
        'refferal_code',
        'is_verified_email',
        'is_verified_mobile',
    ];

    //关联用户地址表
    public function user_address()
    {
        return $this->hasOne(UserAddress::class, 'user_id', 'id');
    }
    //关联用户详情表
    public function user_details()
    {
        return $this->hasOne(UserDetails::class, 'user_id', 'id');
    }


    //关联 user_deposits 用户押金
    public function deposits()
    {
        return $this->hasOne(UserDeposits::class, 'user_id', 'id');
    }
    /**
     * 关联 user_points 积分
     */
    public function points()
    {
        return $this->hasOne(UserPoints::class, 'user_id', 'id');
    }
    // 关联 user_information_change_historys 用户资料变更历史记录
    public function historys()
    {
        return $this->hasOne(UserInformationChange::class, 'user_id', 'id');
    }
    //关联 wallet_adjustments 用户钱包
    public function wallets()
    {
        return $this->hasOne(UserWallets::class, 'user_id', 'id');
    }
    //关联钱包调整
    public function adjustments()
    {
        return $this->hasOne(WalletAdjustments::class, 'user_id', 'id');
    }



    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}

?>