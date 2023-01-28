<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Book;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    public function create(int $id)
    {
        $book = Book::findOrFail($id);
        return view('user.review', compact('book'));
    }

    public function store(ReviewRequest $request)
    {
        Review::create([
            'user_id' => Auth::id(),
            'book_id' => $request->bookId,
            'rating' => $request->rating,
            'review_text' => $request->reviewText,
        ]);
        return redirect()->route('user.rental.mypage')
            ->with([
                'message' => 'レビューを投稿しました。',
                'status' => 'info',
            ]);
    }
}
