<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public function book()
    {
        return $this->hasOne(Category::class);
    }

    public function parent_category()
    {
        return $this->belongsTo(ParentCategory::class);
    }
}
