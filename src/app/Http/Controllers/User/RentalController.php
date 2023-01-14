<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\Rental;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Rental\ReturnRequest;
use App\Http\Requests\Rental\CheckoutRequest;

class RentalController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $books = Book::with([
            'authors:id,name',
            'category:id,name',
        ])
            ->whereHas('rental_users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->latest()
            ->get();
        return view('user.mypage', compact('books'));
    }

    public function checkout(CheckoutRequest $request)
    {
        Rental::create([
            'user_id' => $request->userId,
            'book_id' => $request->bookId,
            'checkout_date' => now()->format('Y-m-d'),
            'return_date' => now()->addDay(7)->format('Y-m-d'),
        ]);
        return redirect()->route('user.rental.mypage')
            ->with([
                'message' => '図書を貸出しました。',
                'status' => 'info',
            ]);
    }

    public function return(ReturnRequest $request)
    {
        Rental::where('user_id', $request->userId)
            ->where('book_id', $request->bookId)
            ->update([
                'is_returned' => true,
            ]);
        return redirect()->route('user.rental.mypage')
            ->with([
                'message' => '図書を返却しました。',
                'status' => 'info',
            ]);
    }
}
