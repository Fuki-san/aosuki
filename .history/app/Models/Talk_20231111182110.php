<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Talk extends Model
{
    use HasFactory;
    protected $fillable = ['nickname', 'message', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getImageUrlAttribute()
{
    return Storage::url($this->image_path); // ここを修正
}

public function getImagePathAttribute()
{
    return 'images/talks/' . $this->image; // ここを修正
}

}
