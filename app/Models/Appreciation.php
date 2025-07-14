<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    use HasFactory;

    protected $fillable = [
        'award_name',
        'appreciation_amount',
        'employee_id',
        'date',
        'summary',
    ];

    // Assuming you have an Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
