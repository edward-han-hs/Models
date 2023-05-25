<?php

namespace App\Models\Payment;

use App\Models\BeasModel;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentRecord extends Model
{
    use HasFactory,BeasModel,SoftDeletes;
    protected $table = "payment_record";
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public function users(){
        return $this->hasOne(Users::class,'id','user_id');
    }
}
