<?php

namespace App\Models\Setting;

use App\Abstracts\Model;

class Setting extends Model
{
    protected $table = "settings";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'name',
        'value',
    ];

    protected $visible = ['key', 'name', 'value', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}