<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'society_description',
        'society_social_reason',
        'society_legal_status',
        'society_capital',
        'society_siret_number',
        'society_naf_code',
        'country',
        'address',
        'postal_code',
        'city',
    ];
}
