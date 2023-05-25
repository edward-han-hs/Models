<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminOperateLog extends Model
{
    use SoftDeletes;
    
    protected  $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    //记录操作日志
    public function RecordLog($uid, $content, $ip)
    {
      $logData = new self;
      $logData->uid = $uid;
      $logData->content = $content;
      $logData->dateline = time();
      $logData->ip = $ip;
      $logData->save();
    }
}
