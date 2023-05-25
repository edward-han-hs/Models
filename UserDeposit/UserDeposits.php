<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserDeposits extends Model
{
    protected $table = "user_deposits";
    

    use SoftDeletes,BeasModel;
    //关联transaction表
    public function transaction(){
        return $this->hasOne(Transactions::class,'transaction_id','transaction_id');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
        /** 
     * 申请退款 押金
     */
    public static function applyFor(int $id){
        
       return  self::where('id',$id)->update(['is_stop_service'=>1,"is_return"=>2]);
    }   
    /**
     * 确认退款押金
     */
    public static  function Refund(int $id){
        $data = self::where('id',$id)->first()?->toArray();
      if(!empty($data)){
            return [
                'deposit_id'=>$id,
                'last_deposit'=>$data['deposit_amount'],  
                "previous_type"=>$data['type'],
                "refund_amout"=>$data['deposit_amount'],
            ];
        }else{
            return [];
        }
        return  self::where('id',$id)->update(['is_stop_service'=>1,"is_return"=>2]);
    }    
}
