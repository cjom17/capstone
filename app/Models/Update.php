<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'update_image',
        'update_title', // Fullname
        'update_desc', // Position
        'update_date', // Gender
        'update_place', // Gender
        'date_uploaded', // Date of Birth
    ];

    
}
