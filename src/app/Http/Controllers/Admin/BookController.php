<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ParentCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Author;
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
        return view('admin.book.index', compact(['books', 'parentCategories']));
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
        return view('admin.book.index', compact(['books', 'parentCategories']));
    }

    public function show(int $id)
    {
        $book = Book::with([
            'authors:id,name',
            'publisher:id,name',
            'category:id,parent_category_id,name',
        ])
            ->findOrFail($id);
        return view('admin.book.show', compact(['book']));
    }

    public function create()
    {
        $parentCategories = ParentCategory::with('categories')
            ->get();
        $publishers = Publisher::get();
        $authors = Author::get();
        return view('admin.book.create', compact(['parentCategories', 'publishers', 'authors']));
    }

    public function store(StoreRequest $request)
    {
        $fileNameToStore = ImageService::upload($request->file('image'), 'books');
        $book = Book::create([
            'publisher_id' => $request->publisher,
            'category_id' => $request->category,
            'title' => $request->title,
            'isbn_13' => $request->isbn_13,
            'image' => $fileNameToStore,
            'published_date' => $request->published_date,
        ]);
        $book->authors()->sync($request->authors);
        return redirect()->route('admin.book.edit', ['bookId' => $book->id])
            ->with([
                'message' => '図書情報を登録しました。',
                'status' => 'info',
            ]);
    }

    public function edit(int $id)
    {
        $book = Book::with([
            'authors:id,name',
            'publisher:id,name',
            'authors:id,name',
            'category:id,parent_category_id,name',
        ])
            ->findOrFail($id);
        $parentCategories = ParentCategory::with('categories')
            ->get();
        $publishers = Publisher::get();
        $authors = Author::get();
        // Collection で渡すのは無駄が多いので id のみ切り出して渡す
        $authorIds = $book->authors->pluck('id')->toArray();
        return view('admin.book.edit', compact([
            'book',
            'parentCategories',
            'publishers',
            'authors',
            'authorIds',
        ]));
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
        $book->authors()->sync($request->authors);
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
