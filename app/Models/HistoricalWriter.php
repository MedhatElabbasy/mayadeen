<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalWriter extends Model
{
    use HasFactory;
    protected $table = 'historical_writers';

    protected $fillable = [
      
        'writer_name',
        'writer_img',
        'About_writer',
       
    ];
}

