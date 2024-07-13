<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function subject(){
        $this->hasOne(subject::class);
    }
}
