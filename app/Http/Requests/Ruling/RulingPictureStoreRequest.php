<?php

namespace App\Http\Requests\Ruling;

use Illuminate\Foundation\Http\FormRequest;

class RulingPictureStoreRequest extends FormRequest
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
            'ruling_id'     => ['required'],
            'path'          => ['required','array'],
            'path.*'        => ['required','image'],
        ];
    }
}
