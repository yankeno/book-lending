<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'published_date',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function review_users()
    {
        return $this->belongsToMany(User::class, 'reviews', 'book_id', 'user_id');
    }

    public function rental_users()
    {
        return $this->belongsToMany(User::class, 'rentals', 'book_id', 'user_id');
    }

    public function status()
    {
        return Rental::select(['checkout_date', 'return_date', 'is_returned'])
            ->where('book_id', $this->id)
            ->latest()
            ->first();
    }

    public function ratingAverage()
    {
        return Review::where('book_id', $this->id)
            ->avg('rating');
    }

    public function reviewsCount()
    {
        return Review::where('book_id', $this->id)
            ->count();
    }

    public function scopeSelectCategory($query = null, $categoryId)
    {
        if ($categoryId !== 0) {
            $query->where('category_id', $categoryId);
        }
        return $query;
    }

    public function scopeSearchKeyword($query = null, string $keyword = null)
    {
        if (!is_null($keyword)) {
            $spaceConvert = mb_convert_kana($keyword, 's');
            $keywords = preg_split('/[\s]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($keywords as $keyword) {
                $query->where('books.title', 'like', '%' . $keyword . '%');
            }
        }
        return $query;
    }
}
