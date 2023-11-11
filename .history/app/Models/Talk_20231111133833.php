<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    use HasFactory;
   protected $fillable = ['user_name', 'message'];

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
