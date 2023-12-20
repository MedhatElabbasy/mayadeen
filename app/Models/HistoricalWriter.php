<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalWriter extends Model
{
    use HasFactory;
    protected $table = 'historical_writers';

    protected $fillable = [
        'event_name',
        'writer_name',
        'Name_poem',
        'audio_file',
       
    ];
}
