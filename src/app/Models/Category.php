<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Category::class);
    }

    public function parent_category()
    {
        return $this->belongsTo(ParentCategory::class);
    }
}
