<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ParentCategory;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with([
            'authors:id,name',
            'category:id,name',
        ])
            ->paginate(50);
        $parentCategories = ParentCategory::with('categories')
            ->get();
        return view('admin.index', compact(['books', 'parentCategories']));
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
        return view('admin.index', compact(['books', 'parentCategories']));
    }

    public function show($id)
    {
        $book = Book::with([
            'authors:id,name',
            'publisher:id,name',
            'category:id,parent_category_id,name',
        ])
            ->findOrFail($id);
        return view('admin.show', compact(['book']));
    }

    public function edit($id)
    {
        return view('admin.edit');
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }
}
