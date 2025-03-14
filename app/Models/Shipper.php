<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    /** @use HasFactory<\Database\Factories\ShipperFactory> */
    use HasFactory;

    protected $primaryKey = 'shipper_id';
    
    protected $fillable = [
        'shipper_name',
        'phone'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'shipper_id');
    }
}
