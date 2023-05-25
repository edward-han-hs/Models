<?php

namespace App\Models\Promotions;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    protected $table  = "promotion";
    use HasFactory,SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {  
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
