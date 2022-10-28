<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_info extends Model
{
    use HasFactory;
    protected $table = 'test_info';
    protected $fillable = [
        'sub_category',
        'test_name',
        'price',
        'referref_fee',
    ];
}
