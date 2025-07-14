<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'from_role', 'client_id'];

    // This belongs to a client
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
