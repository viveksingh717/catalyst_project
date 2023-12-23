<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalyst extends Model
{
    use HasFactory;

    protected $table = 'catalysts';

    protected $fillable = ['name', 'domain', 'year_founded', 'industry', 'size_range', 'locality', 'country', 'linkedin_url', 'current_employee_estimate', 'total_employee_estimate'];
}
