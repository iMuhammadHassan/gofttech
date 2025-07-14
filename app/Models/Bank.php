<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'banks';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'account_holder',
        'account_number',
        'contact_number',
        'status',
    ];
}
