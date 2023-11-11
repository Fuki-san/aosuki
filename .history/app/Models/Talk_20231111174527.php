<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Talk extends Model
{
    use HasFactory;
    protected $fillable = ['nickname', 'message', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }
        public function image_url()
    {
        return Storage::url('images/posts/' . $this->image);
    }
}

}
