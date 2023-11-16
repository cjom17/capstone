<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $dates = ['event_date', 'date_uploaded'];

    protected $fillable = [
        'admin_id',
        'event_image',
        'event_title', // Fullname
        'event_desc', // Position
        'event_date', // Gender
        'date_uploaded', // Date of Birth
    ];

}
