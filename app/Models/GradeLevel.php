<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'grade_lvl',
        'gradelvl_desc', 

    ];

}
