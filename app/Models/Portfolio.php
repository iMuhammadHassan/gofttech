<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional)
    protected $table = 'portfolios';

    // The attributes that are mass assignable
    protected $fillable = [
        'project_title',
        'main_image',
        'inner_image_1',
        'inner_image_2',
        'date',
        'domain',
        'main_description',
        'inner_description_1',
        'inner_description_2',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'date' => 'date',
    ];
}
