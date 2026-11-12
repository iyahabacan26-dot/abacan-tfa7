<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    const UPDATED_AT = null;
    protected $table = 'customers';

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'created_at',
    ];
}