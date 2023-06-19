<?php

namespace App\Models\User;

use Carbon\Carbon;
use App\Abstracts\Model;
use Laravel\Sanctum\HasApiTokens;

class Bookmark extends Model
{
    use HasApiTokens;

    protected $table = "user_bookmarks";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'type',
        'lat',
        'long',
        'detail_address',
        'status',
    ];

    protected $visible = ['uuid', 'type', 'lat', 'long', 'detail_address', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}