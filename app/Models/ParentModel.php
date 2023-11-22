<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ParentModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'profile_picture', 
        'f_name', 
        'l_name', 
        'm_name', 
        'x_name', 
        'gender', 
        'civil_status',
        'nationality',
        'religion',
        'address',
        'phone_number',
        'age',
        'student_lrn',
        'username',
        'email',
        'password',
        'role',
    ];



}
