<?php

namespace App\Models\Transaction;

use Carbon\Carbon;
use App\Abstracts\Model;

class Transaction extends Model
{
    protected $table = "transactions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'type',
        'status',
        'response',
        'callback',
    ];

    protected $visible = ['order_id', 'type', 'status', 'status', 'response', 'callback', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}