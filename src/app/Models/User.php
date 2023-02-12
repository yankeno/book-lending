<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'rentals', 'user_id', 'book_id')
            ->withPivot('checkout_date', 'return_date', 'is_returned')
            ->as('rentals');
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    /**
     * 貸出中の本をカウント
     *
     * @return integer
     */
    public function rentalCount(): int
    {
        return Rental::where('user_id', $this->id)
            ->where('is_returned', 0)
            ->count();
    }

    public function isBorrowingBook($bookId): bool
    {
        return Rental::where('user_id', $this->id)
            ->where('book_id', $bookId)
            ->isCheckedOut()
            ->exists();
    }
}
