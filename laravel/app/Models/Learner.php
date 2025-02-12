<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    protected $table = 'LEARNER';

    protected $fillable = ['email', 'password', 'deleted', 'checkpoint'];
}

