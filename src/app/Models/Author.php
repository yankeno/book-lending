<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function scopeSearchKeyword($query, string $keyword = null)
    {
        if (!is_null($keyword)) {
            $spaceConvert = mb_convert_kana($keyword, 's');
            $keywords = preg_split('/[\s]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($keywords as $keyword) {
                $query->where('authors.name', 'like', '%' . $keyword . '%');
            }
        }
        return $query;
    }

    public function scopeStatus($query, string $status)
    {
        if ($status === \Constant::IS_ACTIVE_AUTHOR) {
            return $query->whereNull('deleted_at');
        } elseif ($status === \Constant::IS_NOT_ACTIVE_AUTHOR) {
            return $query->whereNotNull('deleted_at');
        }
        return $query;
    }
}
