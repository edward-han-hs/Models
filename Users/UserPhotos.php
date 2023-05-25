<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;;
use Illuminate\Database\Eloquent\Model;

class UserPhotos extends Model
{
    protected $table = "user_photos";
    
    use SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public static function getPhoto($uuid){
        return self::where('uuid',$uuid)->select(['id','front_photo_key','back_photo_key'])->first()?->toArray();
    }

    
}
