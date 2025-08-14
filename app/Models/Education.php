<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'degree',
        'university',
        'start_date',
        'end_date',
        'description',
        'grade'
    ];
}
