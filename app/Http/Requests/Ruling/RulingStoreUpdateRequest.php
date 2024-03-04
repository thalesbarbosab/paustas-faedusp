<?php

namespace App\Http\Requests\Ruling;

use Illuminate\Foundation\Http\FormRequest;

class RulingStoreUpdateRequest extends FormRequest
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
            'title'  => ['required','max:255'],
            'resume' => ['nullable'],
            'description' => ['required'],
            'publish_date' => ['required','date'],
            'expiration_date' => ['required','date'],
            'author'   => ['nullable'],
        ];
    }
}
