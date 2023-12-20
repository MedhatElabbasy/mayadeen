<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriterHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'auther_name',
        'about_auther',
    ];
}
