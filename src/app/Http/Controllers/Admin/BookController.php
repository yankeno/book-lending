<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ParentCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Publisher;
use App\Services\ImageService;

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

    public function show(int $id)
    {
        $book = Book::with([
            'authors:id,name',
            'publisher:id,name',
            'category:id,parent_category_id,name',
        ])
            ->findOrFail($id);
        return view('admin.show', compact(['book']));
    }

    public function edit(int $id)
    {
        $book = Book::with([
            'authors:id,name',
            'publisher:id,name',
            'category:id,parent_category_id,name',
        ])
            ->findOrFail($id);
        $parentCategories = ParentCategory::with('categories')
            ->get();
        $publishers = Publisher::get();
        return view('admin.edit', compact(['book', 'parentCategories', 'publishers']));
    }

    public function update(int $id, UpdateRequest $request)
    {
        $book = Book::findOrFail($id);
        $fileNameToStore = ImageService::upload($request->file('image'), 'books');
        $book->update([
            'publisher_id' => $request->publisher,
            'category_id' => $request->category,
            'title' => $request->title,
            'isbn_13' => $request->isbn_13,
            'image' => $fileNameToStore === '' ? $book->image : $fileNameToStore,
            'published_date' => $request->published_date,
        ]);
        return redirect()->route('admin.book.edit', ['bookId' => $id])
            ->with([
                'message' => '図書情報を編集しました。',
                'status' => 'info',
            ]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.book.index')
            ->with([
                'message' => '図書を削除しました。',
                'status' => 'alert',
            ]);
    }
}
