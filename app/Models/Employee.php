<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'gender',
        'jabatan',
        'department',
        'date',
        'asset_id',
        'foto'
    ];

    public function assets() {
        return $this->hasMany(Asset::class);
    }
    

}
