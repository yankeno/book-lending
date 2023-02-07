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

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
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
        return $this->belongsToMany(User::class, 'rentals', 'book_id', 'user_id');;
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

    public function scopeFilter($query, string $filter)
    {
        // book ごとの最新のレコード
        $subRental = Rental::selectRaw('book_id, max(created_at) AS latest_rental_date')
            ->isCheckedOut()
            ->groupBy('book_id');

        // 最新のレコードの状態が貸出中の book_id を取得
        $bookIds = Rental::select('rentals.book_id')
            ->joinSub($subRental, 'latest_rental', function ($join) {
                $join->on('rentals.book_id', '=', 'latest_rental.book_id')
                    ->on('rentals.created_at', '=', 'latest_rental.latest_rental_date');
            })
            ->get();

        if ($filter === \Constant::IS_CHECKED_OUT) {
            return $query->whereIn('id', $bookIds);
        }

        if ($filter === \Constant::IS_RETURNED) {
            return $query->whereNotIn('id', $bookIds);
        }
    }

    public function canBeBorrowed(): bool
    {
        $rental = Rental::select('is_returned')
            ->where('book_id', $this->id)
            ->latest()
            ->first();

        // 取得できない = 借りられたことがない
        return $rental ? $rental->is_returned : true;
    }

    public function ratingAverage(): float
    {
        $avg = Review::where('book_id', $this->id)
            ->avg('rating');
        return $avg ?: 0;
    }

    public function reviewsCount(): int
    {
        return Review::where('book_id', $this->id)
            ->count();
    }

    public function borrower()
    {
        $rental = Rental::where('book_id', $this->id)
            ->latest()
            ->first();
        return User::findOrFail($rental->user_id);
    }
}
