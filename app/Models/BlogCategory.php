<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    public function getBlogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
