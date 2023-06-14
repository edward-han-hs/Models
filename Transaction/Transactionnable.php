<?php

namespace App\Models\Transaction;

use Carbon\Carbon;
use App\Abstracts\Model;

class Transactionnable extends Model
{
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
}