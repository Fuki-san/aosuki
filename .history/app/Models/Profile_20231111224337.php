<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['nickname', 'body', 'image','hobby','dislike', 'mbti', 'smoking', 'distance', 'geographic_condition'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
