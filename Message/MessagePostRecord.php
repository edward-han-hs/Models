<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BeasModel;
use Illuminate\Database\Eloquent\SoftDeletes;;
class MessagePostRecord extends Model
{
    protected $table = "message_post_record";
    use HasFactory,BeasModel,SoftDeletes;
    
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    
} 
