<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectlisRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'creator_price.*' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'creator_price.*.numeric' => '売上金額を半角数字で入力してください。',
        ];
    }
}
