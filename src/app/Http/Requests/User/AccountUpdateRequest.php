<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userId' => ['required', 'array'],
        ];
    }

    public function messages()
    {
        return [
            'userId.required' => 'いずれかのユーザにチェックを入れてください。',
        ];
    }
}
