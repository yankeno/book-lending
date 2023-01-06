<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $newBooks = $this->book
            ->orderByDesc('created_at')
            ->limit(10)
            ->with(['authors:name', 'publisher:name', 'categories.parent_category:name'])
            ->get();
        // dd($newBooks);
        return view('user.search', compact('newBooks'));
    }
}
