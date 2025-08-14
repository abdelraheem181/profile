<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'description',
        'company_name',
        'start_date',
        'end_date',
        'is_current',
    ];
}
