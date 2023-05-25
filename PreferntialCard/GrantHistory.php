<?php

namespace App\Models\PreferntialCard;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class GrantHistory extends Model
{
    use HasFactory,SoftDeletes,BeasModel;
    protected  $table='grant_history';

    protected function serializeDate(\DateTimeInterface $date)
    {  
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public function preferential_card(){
        return $this->hasOne(PreferntialCard::class,'id','preferential_card_id');
    }
    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
