<?php

namespace App\Models\PreferntialCard;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreferntialAddedRecord extends Model
{
    protected $table = 'preferential_added_record';
    use HasFactory, BeasModel, SoftDeletes;

    public function preferential_card()
    {
        return $this->hasOne(PreferntialCard::class, 'id', 'preferntial_id');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}