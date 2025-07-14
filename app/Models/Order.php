<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'message',
        'package_id',
    ];

    // Relationship to the Package model
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
