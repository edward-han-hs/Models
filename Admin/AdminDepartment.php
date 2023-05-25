<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminDepartment extends Model
{
    use SoftDeletes;
    
    protected  $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public function roles()
    {
        return $this->hasMany(AdminRole::class, "department_id", "id");
    }
}
