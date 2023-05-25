<?php

namespace App\Models\UpdateRecord;

use App\Models\Admin;
use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpdateUserInfoRecord extends Model
{
    protected $table = "update_user_info_record";
    use HasFactory,SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public function admin(){
        return $this->hasOne(Admin::class,'id','admin_id');
    }

    public static function insertRecord(Array $insert){ 
        $insert['created_at'] = date("Y-m-d H:i:s");
       return  self::insert($insert);
    }


}
