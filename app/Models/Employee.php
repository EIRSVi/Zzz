<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $primaryKey = 'employee_id';
    
    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'hire_date',
        'address',
        'city',
        'postal_code',
        'country'
    ];

    protected $casts = [
        'hire_date' => 'date'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id');
    }
}
