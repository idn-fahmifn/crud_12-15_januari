<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name', 'desc', 'slug', 'image', 'stok', 'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
