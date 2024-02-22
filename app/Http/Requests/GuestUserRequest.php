<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class GuestUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email is already in use. Please log in or use a different email.',
        ];
    }
}
