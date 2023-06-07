<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusCode extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "status_codes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'model_type',
        'status',
        'name',
        'desc',
    ];

    protected $visible = ['model_type', 'status', 'name', 'desc', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}