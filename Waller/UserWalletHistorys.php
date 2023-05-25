<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserWalletHistorys extends Model
{
     protected $table = "user_wallet_history";
    
    use SoftDeletes,BeasModel;
 
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public function transactions(){
        return $this->hasOne(Transactions::class,'transaction_id','transaction_id');
    }
}
