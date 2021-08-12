<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'roll_no','maths','physics','chemistery','computer_science','biology',
    ];
}
