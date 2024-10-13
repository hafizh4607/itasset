<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'name',
        'type',
        'type_asset',
        'os',
        'processor',
        'ram',
        'storage',
        'sn',
        'antivirus',
        'port',
        'key',
        'license',
        'expired',
        'employee_id',
        
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }


}

