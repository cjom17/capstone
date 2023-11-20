<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'admin_id',
        'profile_picture', // Profile Picture
        'image_id',
        'fullname', 
        'position', 
        'id_number', 
        'advisory_lvl', 
        'section_name',
        'gender', 
        'date_of_birth',
        'civil_status',
        'address',
        'phone_number',
        'username',
        'email',
        'password',
        'status',
    ];

}
