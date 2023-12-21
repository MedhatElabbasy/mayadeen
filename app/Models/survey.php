<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'facilities',
        'organization',
        'events',
        'access',
    ];

}
