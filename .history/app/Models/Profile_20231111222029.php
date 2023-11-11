<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['nickname', 'body', 'image','hobby_name','dislike_name', 'mbti_type', 'smoking_preference', ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}