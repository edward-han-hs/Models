<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionsHistorys extends Model
{    
    protected $table = "transaction_history";
    
    use SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public static function getAll($where = [],$select=[])
    {
          return  self::where($where)->select($select)->get()?->toArray();
    }
}
