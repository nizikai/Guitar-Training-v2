<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'CONTENT';

    //many to one relation with SONG
    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id');
    }
}