<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLearnerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'learnerEmail' => 'required|email',
            'learnerPassword' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'learnerEmail.required' => 'Email pelajar wajib diisi.',
            'learnerEmail.email' => 'Format email tidak valid.',
            'learnerPassword.required' => 'Password pelajar wajib diisi.',
            'learnerPassword.min' => 'Password harus terdiri dari 6 karakter.',
        ];
    }
}
