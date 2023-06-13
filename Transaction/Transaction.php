<?php

namespace App\Models\Transaction;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, HasFactory;

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

    protected $visible = ['order_id', 'type', 'status', 'status', 'response', 'callback', 'created_by', 'updated_by', 'created_at', 'updated_at', 'order_extensions', 'order_item'];

    public function detail()
    {
        return $this->morphOne('App\Models\Transaction\Transactionnable', 'transactionnable');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}