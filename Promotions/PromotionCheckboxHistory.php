<?php

namespace App\Models\Promotions;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionCheckboxHistory extends Model
{
    protected  $table = "promotion_checkbox_history";
    use HasFactory,SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {  
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
