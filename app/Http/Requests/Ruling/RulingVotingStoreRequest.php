<?php

namespace App\Http\Requests\Ruling;

use App\Rules\RightCpf;
use App\Rules\RightCnpj;
use App\Helpers\Sanitize;
use App\Rules\RightEmail;
use App\Rules\GoogleRecaptcha;
use Illuminate\Foundation\Http\FormRequest;

class RulingVotingStoreRequest extends FormRequest
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
            'ruling_id' => 'required|exists:rulings,id',
            'cpf' => ['required', "unique:ruling_votings,cpf,{$this->id}", 'digits:11', 'numeric', new RightCpf],
            'name' => 'required|string|max:200',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:2',
            'email' => ['required', "unique:ruling_votings,email,{$this->id}", 'email', 'required_if:customer_status_id,2', new RightEmail],
            'company_name' => 'nullable|string|max:200|required_with:cnpj',
            'cnpj' => ['nullable', "unique:ruling_votings,cnpj,{$this->id}", 'digits:14', 'numeric', new RightCnpj],
            'g-recaptcha-response'      =>  ['required', new GoogleRecaptcha],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cpf' => $this->cpf ? Sanitize::correctCpf($this->cpf) : null,
            'name' => $this->name ? Sanitize::setUppercaseString($this->name) : null,
            'city' => $this->city ? Sanitize::setUppercaseString($this->city) : null,
            'state' => $this->state ? Sanitize::setUppercaseString($this->state) : null,
            'cnpj' => $this->cnpj ? Sanitize::correctCnpj($this->cnpj) : null,
            'company_name' => $this->company_name ? Sanitize::setUppercaseString($this->company_name) : null,
        ]);
    }
}
