<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','on_sale','image','category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
