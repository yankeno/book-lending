<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
