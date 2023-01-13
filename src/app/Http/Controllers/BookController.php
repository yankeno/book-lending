<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $newBooks = Book::with('authors:id,name')
            ->latest()
            ->limit(10)
            ->get();
        $parentCategories = ParentCategory::with('categories')
            ->get();
        return view('user.index', compact(['newBooks', 'parentCategories']));
    }

    public function search(Request $request)
    {
        $books = Book::with([
            'authors:id,name',
            'category:id,name',
        ])
            ->selectCategory((int)$request->category)
            ->searchKeyword($request->keyword)
            ->latest()
            ->get();
        $parentCategories = ParentCategory::with('categories')
            ->get();
        return view('user.index', compact(['books', 'parentCategories']));
    }

    public function show($id)
    {
        $book = Book::with([
            'authors:id,name',
            'publisher:id,name',
            'category:id,parent_category_id,name',
        ])
            ->findOrFail($id);
        return view('user.show', compact('book'));
    }

    public function mypage()
    {
        $userId = Auth::id();
        $books = Book::with([
            'authors:id,name',
            'category:id,name',
        ])
            ->whereHas('rental_users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->latest()
            ->get();
        // dd($books);
        return view('user.mypage', compact('books'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $count = $user->rentalCount();
        if ($count >= 3) {
            return redirect()
                ->back()
                ->with([
                    'message' => '1度に借りられる図書は3冊までです。',
                    'status' => 'alert',
                ]);
        }
        return redirect()->route('user.book.mypage');
    }
}
