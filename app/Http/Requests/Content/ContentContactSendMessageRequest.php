<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\GoogleRecaptcha;

class ContentContactSendMessageRequest extends FormRequest
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
            'g-recaptcha-response'      =>  ['required', new GoogleRecaptcha],
            'name'                      =>  'required|max:250',
            'email'                     =>  'required|email|max:250',
            'message'                   =>  'required|min:10',
        ];
    }

    protected function prepareForValidation()
    {
        //
    }
}
