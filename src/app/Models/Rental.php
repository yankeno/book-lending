<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';
    protected $fillable = [
        'user_id',
        'book_id',
        'checkout_date',
        'return_date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function scopeIsCheckedOut($query)
    {
        return $query->where('is_returned', 0);
    }
}
