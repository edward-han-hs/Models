<?php

namespace App\Models\Setting;

use Carbon\Carbon;
use App\Abstracts\Model;

class Holiday extends Model
{
    protected $table = "holidays";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'date_from',
        'date_to',
    ];

    protected $visible = ['uuid', 'name', 'date_from', 'date_to', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}