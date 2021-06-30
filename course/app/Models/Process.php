<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable =['name','detail'
    ];
    

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
