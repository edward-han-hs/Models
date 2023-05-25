<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalConfigRecord extends Model
{
    protected $table = "global_config_record";
    use HasFactory,BeasModel,SoftDeletes;
    public function Admin(){
        return $this->hasOne(Admin::class,'id','admin_id');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    
}
