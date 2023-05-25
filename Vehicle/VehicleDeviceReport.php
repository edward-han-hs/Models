<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class VehicleDeviceReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 动态指定数据表
    public function selectDateTimeReport($vehicleId, $days = null, $perPage = 10)
    {
        $tbName = 'vehicle_device_' . $vehicleId . '_' . ($days ?? date("Ym", time())) . '_reports';
        if($days && Schema::hasTable($tbName)){
            return DB::table($tbName)->orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate($perPage);
        }else{
            return self::where('vehicleid', $vehicleId)->orderBy('created_at', 'desc')->paginate($perPage);
        }
        return ['data' => [], 'total' => 0];
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }
}
