<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'last_name',
        'first_name',
        'phone_number',
        'email',
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'day_sell',
    ];
}
