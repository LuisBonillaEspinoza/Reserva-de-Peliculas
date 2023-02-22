<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            //SOlO LETRAS
            'name_user' => 'required|regex:/^[\pL\s\-]+$/u',
            'apema_user' => 'required|regex:/^[\pL\s\-]+$/u',
            'apepa_user' => 'required|regex:/^[\pL\s\-]+$/u',
            //SOLO NUMEROS, SIENDO 9
            'telefono_user' => 'required|digits:9',
            'email_user' => 'required|unique:users,email_user',
            'direccion_user' => 'required',
            'username_user' => 'required|unique:users,username_user',
            'password_user' => 'required'
        ];
    }
}
