<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_code',
        'project_name',
        'start_date',
        'deadline',
        'price',
        'department_id',
        'client_id',
        'member_id',
        'initial_requirement',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function member()
    {
        return $this->belongsTo(Employee::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
