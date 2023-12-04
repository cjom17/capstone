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
        'event_title',
        'event_desc', 
        'event_people', 
        'event_place', 
        'event_date', 
        'date_uploaded', 
    ];

}
