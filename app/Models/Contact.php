<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'phone',
        'email',
        'contact_method',
        'company',
        'address',
        'address2',
        'city',
        'zip_code',
        'website_url',
        'follow_up_date',
        'notes',
        'deal_size',
        'stage_id',
        'staff_id'
    ];
}
