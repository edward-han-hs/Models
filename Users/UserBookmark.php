<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
class UserBookmark extends Model
{
    protected $table = "user_bookmark";
    use HasFactory,BeasModel,SoftDeletes;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    // protected static function boot()
    // {
       
    //     static::creating(function ($model) {
            
           
    //           $model->uuid = ::uuid4()->toString();
    //       });
    // }

}
