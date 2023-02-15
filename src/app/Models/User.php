<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

    public function scopeSearchKeyword($query, string $keyword = null)
    {
        if (!is_null($keyword)) {
            $spaceConvert = mb_convert_kana($keyword, 's');
            $keywords = preg_split('/[\s]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($keywords as $keyword) {
                $query->where('users.name', 'like', '%' . $keyword . '%');
            }
        }
        return $query;
    }

    public function scopeAccountStatus($query, string $status)
    {
        if ($status === \Constant::IS_ACTIVE) {
            return $query->whereNull('deleted_at');
        } elseif ($status === \Constant::IS_NOT_ACTIVE) {
            return $query->whereNotNull('deleted_at');
        }
        return $query;
    }

    public function scopeArrearsStatus($query, string $status)
    {
        if ($status === \Constant::HAS_OVERDUE) {
            return $query->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('rentals')
                    ->where('is_returned', 0)
                    ->where('return_date', '<', now()->format('Y-m-d'))
                    ->whereColumn('rentals.user_id', 'users.id');
            });
        } elseif ($status === \Constant::NOT_HAS_OVERDUE) {
            return $query->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('rentals')
                    ->where('is_returned', 0)
                    ->where('return_date', '<', now()->format('Y-m-d'))
                    ->whereColumn('rentals.user_id', 'users.id');
            });
        }
        return $query;
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
