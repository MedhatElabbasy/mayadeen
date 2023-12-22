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


    public function surveyText($status)
    {
        $img = "";
        $text = "";
        if($status == "verySatified"){
            $img = asset('website/imges/rating/very_suf.svg');
            $text = "راضي جداً";
        }else if($status == "satified"){
            $img = asset('website/imges/rating/suf.svg');
            $text = "راضي";
        }else if($status == "neutral"){
            $img = asset('website/imges/rating/mid.svg');
            $text = "محايد";
        }else if($status == "upset"){
            $img = asset('website/imges/rating/sad.svg');
            $text = "غير راضي";
        }else if($status == "veryUpset"){
            $img = asset('website/imges/rating/very_sad.svg');
            $text = "غير راضي جداً";
        }
        return [
            'img' => $img,
            'text' => $text,
        ];

    }
}
