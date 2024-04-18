<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConsumers extends FormRequest
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
            //バリデーション
            'name' => 'required|string|max:10',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:10|confirmed',
            
        ];
    }
}
