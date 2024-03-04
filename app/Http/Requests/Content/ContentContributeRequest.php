<?php
namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContentContributeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bank_info'         => ['required','max:255'],
            'pix_copy_paste'    => ['nullable'],
            'pix_key'           => ['nullable','max:255'],
            'company_name'      => ['required','max:255'],
            'cnpj'              => ['required','max:30'],
            'contribute_contact'=> ['nullable'],
            'contribute_title'  => ['required','max:255'],
            'contribute_subtitle'=>['nullable','max:255'],
            'contribute_more_info'=> ['nullable'],
        ];
    }
}

