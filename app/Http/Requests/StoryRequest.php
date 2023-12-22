<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            // 'description' => 'nullable|string|max:255',
            'content' => 'required|string',

            // Writer 1
            'w1_name' => 'required|string|max:255',
            'w1_number' => 'required|numeric',
            'w1_email' => 'required|email|unique:stories,w1_email',

            // Writer 2
            'w2_name' => 'required|string|max:255',
            'w2_number' => 'required|numeric',
            'w2_email' => [
                'required' => 'حقل البريد الإلكتروني للكاتب  مطلوب.',
                'email' => 'يجب أن يكون البريد الإلكتروني للكاتب  صالحاً.',
                'unique' => 'البريد الإلكتروني للكاتب  مأخوذ بالفعل.',
            ],

            // Writer 3
            'w3_name' => 'required|string|max:255',
            'w3_number' => 'required|numeric',
            'w3_email' => 'required|email|unique:stories,w3_email',
        ];
    }



    public function messages()
    {
        return [
            'w1_email.unique' => 'البريد الإلكتروني للكاتب  مأخوذ بالفعل.',
            'w2_email.unique' => 'البريد الإلكتروني للكاتب  مأخوذ بالفعل.',
            'w3_email.unique' => 'البريد الإلكتروني للكاتب  مأخوذ بالفعل.',
        ];
    }
}