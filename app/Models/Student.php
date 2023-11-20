<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'teacher_id',
        'section_name',
        'student_lrn',
        'year_lvl',
        'profile_picture', 
        'f_name', 
        'l_name', 
        'm_name', 
        'x_name', 
        'gender', 
        'date_of_birth',
        'civil_status',
        'age',
        'religion',
        'nationality',
        'address',
        'phone_number',
        'mother_name',
        'father_name',
        'username',
        'email',
        'password',
    ];
}
