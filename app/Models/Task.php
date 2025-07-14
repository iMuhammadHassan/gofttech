<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'start_date',
        'end_date',
        'assigned_to',
        'status',
        'description'
    ];
    

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'assigned_to');
    }

    public function project()
    {
        return $this->belongsTo(Project::class ,'assigned_to');
    }
}
