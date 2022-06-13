<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    # Many to One
    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function shopcart() {

        return $this->hasMany(ShopCart::class);
    }


}
