<?php

namespace App\Models\Transaction;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactionnable extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "transactionnables";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transactionnable_type',
        'transactionnable_id',
        'transaction_id',
    ];

    protected $visible = ['transactionnable_type', 'transactionnable_id', 'transaction_id', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    public function transactionnable()
    {
        return $this->morphTo();
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