<?php

namespace App\Models\PreferntialCard;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreferntialCard extends Model
{
    protected  $table='preferential_card';

    use HasFactory,BeasModel,SoftDeletes;
    protected function serializeDate(\DateTimeInterface $date)
    {  
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
