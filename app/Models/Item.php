<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name', 'desc', 'slug', 'image', 'stock'
    ];


    public function category()
    {
        $this->belongsTo(Category::class, 'category_id');
    }
}
