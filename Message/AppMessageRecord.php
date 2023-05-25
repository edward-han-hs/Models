<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BeasModel;
use Illuminate\Database\Eloquent\SoftDeletes;;
class AppMessageRecord extends Model
{
    protected $table = "app_message_record";
    use HasFactory,BeasModel,SoftDeletes;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
