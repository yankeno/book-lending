<?php

namespace App\Http\Requests\Rental;

use App\Http\Requests\RentalRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CheckoutRequest extends RentalRequest
{
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $user = Auth::user();
            $book = Book::findOrFail($this->input('bookId'));
            if ($user->rentalCount() >= 3) {
                $validator->errors()->add('', '1度に借りられる図書は3冊までです。');
            }
            // Rental が取得できて（貸し出されたことがある）返却済みの場合
            if ($book->status() && !$book->status()->is_returned) {
                $validator->errors()->add('', '選択された図書は既に貸出中です。');
            }
        });
    }
}
