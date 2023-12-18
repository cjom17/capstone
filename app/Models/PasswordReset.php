<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
    
}
