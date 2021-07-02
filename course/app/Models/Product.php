<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table='products';
    protected $fillable = ['name', 'weight', 'detail', 'user_id', 'create_at', 'ractopamine'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function process(): BelongsToMany
    {
        return $this->belongsToMany(Process::class, 'products_processes', 'product_id', 'process_id');
    }
}
