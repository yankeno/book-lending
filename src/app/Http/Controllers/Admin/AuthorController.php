<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\UpdateRequest;
use App\Http\Requests\Author\StatusUpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withTrashed()
            ->orderBy('id')
            ->paginate(50);

        return view('admin.author.index', compact('authors'));
    }

    public function search(Request $request)
    {
        $authors = Author::withTrashed()
            ->searchKeyword($request->keyword)
            ->status($request->author_status)
            ->orderBy('id')
            ->paginate(50);
        return view('admin.author.index', compact('authors'));
    }

    public function update(int $id, UpdateRequest $request)
    {
        try {
            Author::findorfail($id)
                ->update(['name' => $request->name]);
            return response()->json(['message' => '著者情報を更新しました。'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => '著者情報の更新に失敗しました。'], 400);
        }
    }

    public function restore(StatusUpdateRequest $request)
    {
        Author::withTrashed()
            ->whereIn('id', array_keys($request->authorId))
            ->restore();
        return redirect()->route('admin.author.index')
            ->with([
                'message' => '著者を再開しました。',
                'status' => 'info',
            ]);
    }

    public function destroy(StatusUpdateRequest $request)
    {
        Author::whereIn('id', array_keys($request->authorId))
            ->delete();
        return redirect()->route('admin.author.index')
            ->with([
                'message' => '著者を削除しました。',
                'status' => 'alert',
            ]);
    }
}
