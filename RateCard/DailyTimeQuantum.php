<?php

namespace App\Models\RateCard;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyTimeQuantum extends Model
{
    protected $table = "daily_time_quantum";
    use SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public function rateCard(){
        return $this->hasMany(DailyRateCard::class,'time_quantum','id');
    }
}
