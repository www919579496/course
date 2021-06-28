<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function processes(){
        return $this->belongsToMany(Process::class);
    }
}
