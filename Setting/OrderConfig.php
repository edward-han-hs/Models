<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderConfig extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "order_configs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'desc',
        'value',
        'unit',
    ];

    protected $visible = ['name', 'desc', 'value', 'unit', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}