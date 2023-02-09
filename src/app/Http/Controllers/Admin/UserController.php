<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('books')->get();
        // foreach ($users as $user) {
        //     // foreach ($user->books as $book) {
        //     //     var_dump($book->rentals->checkout_date);
        //     // }
        //     var_dump($user->books->first()->rentals->checkout_date);
        // }
        // dd($users->first()->books->first()->rentals->first());
        return view('admin.user.index');
    }
}
