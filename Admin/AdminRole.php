<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminRole extends Model
{
    use SoftDeletes;
    
    protected  $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public function department()
    {
        return $this->belongsTo(AdminDepartment::class, 'department_id', 'id');
    }

    public function letterAuditor()
    {
        return $this->hasOne(LetterAuditor::class,'role_id','id');
    }
}
