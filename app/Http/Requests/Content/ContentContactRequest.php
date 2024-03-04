<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContentContactRequest extends FormRequest
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
            'contact_default_email'    =>  ['nullable', 'email','required_if:contact_enable_contact_form,true'],
            'contact_adress' => ['nullable'],
            'contact_phone' => ['nullable'],
            'contact_enable_contact_form' => ['boolean']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'contact_enable_contact_form' => $this->contact_enable_contact_form ? true : false
        ]);
    }
}
