<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Services\User\UserService;

class UserUpdateRequest extends FormRequest
{
    public function __construct(
        protected readonly UserService $user_service
        ){}

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
            'name'              =>  ["required"],
            'email'             =>  ["required","email","unique:{$this->user_service->getEntityClassNamespace()},email,{$this->id}"],
        ];
    }
}
