<?php
namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContentSocialMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'site'      => ['nullable'],
            'instagram' => ['nullable'],
            'facebook' => ['nullable'],
            'youtube' => ['nullable'],
            'whatsApp' => ['nullable'],
            'spotify' => ['nullable'],
            'tweeter' => ['nullable'],
            'medium' => ['nullable'],
        ];
    }
}

