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
            if (!$book->canBeBorrowed()) {
                $validator->errors()->add('', '選択された図書は既に貸出中です。');
            }
        });
    }
}
