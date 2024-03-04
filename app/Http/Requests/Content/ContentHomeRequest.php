<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContentHomeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'home_website_title'        =>  ['required', 'max:255'],
            'home_welcome_title'        =>  ['required', 'max:255'],
            'home_welcome_subtitle'     =>  ['required', 'max:255'],
        ];
    }
}
