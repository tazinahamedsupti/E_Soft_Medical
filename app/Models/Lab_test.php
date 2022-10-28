<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab_test extends Model
{
    use HasFactory;
    protected $table = 'lab_test';
    protected $fillable = [
        'patient_id',
        'test_id',
        'test_reference',
    ];
}
