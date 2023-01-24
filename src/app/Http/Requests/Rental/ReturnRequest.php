<?php

namespace App\Http\Requests\Rental;

use App\Http\Requests\RentalRequest;
use Illuminate\Support\Facades\Auth;

class ReturnRequest extends RentalRequest
{
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $user = Auth::user();
            if (!$user->isBorrowingBook($this->input('bookId'))) {
                $validator->errors()->add('', '選択された図書は貸出されていません。');
            }
        });
    }
}
