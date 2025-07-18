<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'purchased_date',
        'category',
        'project',
        'bank',
        'description',
        'receipt',
    ];
}
