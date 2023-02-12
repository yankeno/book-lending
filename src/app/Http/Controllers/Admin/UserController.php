<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
            ->orderBy('id')
            ->get();
        return view('admin.user.index', compact('users'));
    }
}
