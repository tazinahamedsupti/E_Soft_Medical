<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    use HasFactory;
    protected $table = 'service_list';
    protected $fillable = [
        'patient_id',
        'test_reference',
        'total',
        'discount',
        'payment',
        'due',
        'date',
        'time',
        'time_period',
        'account_status',
        'report_status',
    ];
}
