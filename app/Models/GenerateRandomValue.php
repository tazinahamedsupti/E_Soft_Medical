<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateRandomValue extends Model
{
    use HasFactory;
    protected $table = 'random_test_reference';
    protected $fillable = [
        'patient_id',
        'test_reference',
    ];
}
