<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;
    protected $table = 'test';
    protected $fillable = [
        'main_category',
        'sub_category',
        'test_name',
        'price',
        'referref_fee',
    ];
}
