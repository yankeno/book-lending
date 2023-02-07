<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Auth;
use App\Models\Book;
use App\Models\ParentCategory;
use App\Http\Controllers\Controller;

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
        $booksQuery = Book::with([
            'authors:id,name',
            'category:id,name',
        ])
            ->selectCategory((int)$request->category)
            ->searchKeyword($request->keyword)
            ->latest();

        if (isset($request->filter)) {
            $booksQuery->filter($request->filter);
        }

        $books = $booksQuery->paginate(50);
        $parentCategories = ParentCategory::with('categories')
            ->get();
        return view('user.index', compact(['books', 'parentCategories']));
    }

    public function show(int $id)
    {
        $book = Book::with([
            'authors:id,name',
            'publisher:id,name',
            'category:id,parent_category_id,name',
        ])
            ->findOrFail($id);
        $isBorrowingBook = Auth::user()->isBorrowingBook($id);
        return view('user.show', compact(['book', 'isBorrowingBook']));
    }
}
