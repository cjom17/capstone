<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class EnrolledSubject extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'teacher_id',
        'student_lrn',
        'subject_id',
        'subject_name',
        'subject_desc',
        'first_qtr',
        'second_qtr',
        'third_qtr',
        'fourth_qtr',
        'final',
        'remarks',
    ];
}
