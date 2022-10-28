<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patient';
    protected $fillable = [
        'p_name',
        'p_age',
        'p_mobile',
        'p_gender',
        'p_blood',
        'p_address',
        'p_d_name',
        'p_r_d_name',
    ];
}
