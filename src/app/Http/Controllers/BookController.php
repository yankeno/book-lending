<?php

namespace App\Http\Controllers;

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
        $books = Book::with('authors:id,name')
            ->latest()
            ->selectCategory((int)$request->category)
            ->searchKeyword($request->keyword)
            ->get();
        $parentCategories = ParentCategory::with('categories')
            ->get();
        // dd($books);
        return view('user.index', compact(['books', 'parentCategories']));
    }

    public function show($id)
    {
        return view('user.show');
    }
}
