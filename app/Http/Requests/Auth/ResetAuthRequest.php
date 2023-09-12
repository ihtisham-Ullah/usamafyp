<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'old_password' => [
                'required',
                'string',
                'min:3',
            ],
            'password' => [
                'required',
                'string',
                'min:3',
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:3',
            ],
        ];
    }
}
