<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\User\AccountUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount([
            'rentals as borrowing_count' => function (Builder $query) {
                $query->where('is_returned', 0);
            },
            'rentals as arrears_count' => function (Builder $query) {
                $query->where('is_returned', 0)
                    ->where('return_date', '<', now()->format('Y-m-d'));
            }
        ])
            ->withTrashed()
            ->orderBy('id')
            ->paginate(50);
        return view('admin.user.index', compact('users'));
    }

    public function search(Request $request)
    {
        $users = User::withCount([
            'rentals as borrowing_count' => function (Builder $query) {
                $query->where('is_returned', 0);
            },
            'rentals as arrears_count' => function (Builder $query) {
                $query->where('is_returned', 0)
                    ->where('return_date', '<', now()->format('Y-m-d'));
            }
        ])
            ->withTrashed()
            ->searchKeyword($request->keyword)
            ->accountStatus($request->account)
            ->arrearsStatus($request->arrears)
            ->orderBy('id')
            ->paginate(50);
        return view('admin.user.index', compact('users'));
    }

    public function edit(int $id)
    {
        $user = User::withCount([
            'rentals as borrowing_count' => function (Builder $query) {
                $query->where('is_returned', 0);
            },
            'rentals as arrears_count' => function (Builder $query) {
                $query->where('is_returned', 0)
                    ->where('return_date', '<', now()->format('Y-m-d'));
            }
        ])
            ->withTrashed()
            ->findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(int $id, UpdateRequest $request)
    {
        User::whereId($id)
            ->withTrashed()
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);
        return redirect()->route('admin.user.index')
            ->with([
                'message' => 'ユーザ情報を更新しました。',
                'status' => 'info',
            ]);
    }

    public function restore(AccountUpdateRequest $request)
    {
        User::withTrashed()
            ->whereIn('id', array_keys($request->userId))
            ->restore();
        return redirect()->route('admin.user.index')
            ->with([
                'message' => 'アカウントを再開しました。',
                'status' => 'info',
            ]);
    }

    public function destroy(AccountUpdateRequest $request)
    {
        User::whereIn('id', array_keys($request->userId))
            ->delete();
        return redirect()->route('admin.user.index')
            ->with([
                'message' => 'アカウントを停止しました。',
                'status' => 'alert',
            ]);
    }
}
