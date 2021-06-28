<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table='user_types';
    public function users(){
        return $this->hasMany(User::class,'user_type_id');
    }
}
