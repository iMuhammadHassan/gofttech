<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'type',
        'sub_type',
        'number_of_screens',
        'number_of_pages',
        'design_category',
    ];
}
