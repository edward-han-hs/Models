<?php

namespace App\Models\Device;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleDeviceReports extends Model
{
    use HasFactory,BeasModel,SoftDeletes;
}
