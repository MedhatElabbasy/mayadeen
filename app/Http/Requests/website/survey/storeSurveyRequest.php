<?php

namespace App\Http\Requests\website\survey;

use Illuminate\Foundation\Http\FormRequest;

class storeSurveyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'organization' => 'required|in:verySatified,satified,neutral,upset,veryUpset',
            'events' => 'required|in:verySatified,satified,neutral,upset,veryUpset',
            'facilities' => 'required|in:verySatified,satified,neutral,upset,veryUpset',
            'access' => 'required|in:verySatified,satified,neutral,upset,veryUpset',
        ];
    }
}
