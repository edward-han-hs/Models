<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Vehicle\VehicleModelTypeImage;
class Models extends Model {
	use SoftDeletes,BeasModel;
	protected $table = 'model';
	protected $guarded = [];

	//关联rate_card表
    public function rate_card(){
        return $this->hasMany(RateCard::class,'vehicle_model_code','model_code');
    }

	//关联vehicel_model表
    public function vehicel_model(){
        return $this->hasMany(VehicleModels::class,'model_code','model_code');
    }
	public function model_type_image(){
		return $this->hasMany(VehicleModelTypeImage::class,'model_id','id');
	}
	protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}
}
