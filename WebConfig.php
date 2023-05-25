<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebConfig extends Model
{
    //配置表
    use SoftDeletes,BeasModel;

    protected $guarded = [];


    public function getConfig()
    {
      	if($config = (new self)->where('id', 1)->first()){
        	return $config->toArray();
      	}
      	return false;
    }
}
