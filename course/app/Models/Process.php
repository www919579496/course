<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Process extends Model
{
    protected $fillable = ['name', 'detail'
    ];

    public function product_processes(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'products_processes', 'process_id', 'product_id');
    }
}
