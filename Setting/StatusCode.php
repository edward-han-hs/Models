<?php

namespace App\Models\Setting;

use App\Abstracts\Model;

class StatusCode extends Model
{
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
        'description',
    ];

    protected $visible = ['model_type', 'status', 'name', 'description', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}