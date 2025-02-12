<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'SONG';

    //one to may realation with CONTENT
    public function contents()
    {
        return $this->hasMany(Content::class, 'song_id');
    }
}
