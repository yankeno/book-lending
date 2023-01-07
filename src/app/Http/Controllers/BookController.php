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
            ->with([
                'publisher:id,name',
                'authors:name',
                'categories:parent_category_id,name',
                'categories.parent_category',
            ])
            ->latest()
            ->limit(10)
            ->get();
        return view('user.search', compact('newBooks'));
    }
}
