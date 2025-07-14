<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_name',
        'valid_till',
        'currency',
        'project',
        'amount',
        'description',
        'signature',
        'customer_signature', // Make sure this is included in the fillable fields
        'thank_you_note',
        'require_customer_signature',
    ];

    protected $casts = [
        'valid_till' => 'date',
        'amount' => 'decimal:2',
        'require_customer_signature' => 'boolean',
    ];
}
