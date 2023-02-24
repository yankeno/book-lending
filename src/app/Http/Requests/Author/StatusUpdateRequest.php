<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class StatusUpdateRequest extends FormRequest
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
            'authorId' => ['required', 'array'],
        ];
    }

    public function messages()
    {
        return [
            'authorId.required' => 'いずれかの著者にチェックを入れてください。',
        ];
    }
}
