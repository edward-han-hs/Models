<?php

namespace App\Models\Users;

use App\Models\BeasModel;
use App\Models\LevelConfig;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelRecord extends Model
{
    protected $table = "level_record";
    use HasFactory,BeasModel,SoftDeletes;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public function Level(){
        return $this->hasOne(LevelConfig::class,'level_number','level');
    }
    public function level_later(){
        return $this->hasOne(LevelConfig::class,'level_number','later_level');
    }
}
