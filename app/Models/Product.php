<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;


    protected $table = 'products';

    public function getCategory()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(OrderItem::class, 'item_id', 'id');
    }


}
