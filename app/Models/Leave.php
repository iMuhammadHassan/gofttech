<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    // Specify the table name if different from the default
    protected $table = 'leaves';

    // Fillable fields for mass assignment
    protected $fillable = [
        'employee_id',
        'leave_type',
        'status',
        'date',
        'reason',
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
