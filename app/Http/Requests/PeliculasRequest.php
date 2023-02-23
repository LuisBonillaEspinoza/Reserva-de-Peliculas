<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculasRequest extends FormRequest
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
            'nombre_pelicula' => 'required|regex:/^[\pL\s\-]+$/u',
            'descripcion_pelicula' => 'required|regex:/^[\pL\s\-]+$/u',
            'precio_pelicula' => 'required|numeric',
            'categoria_pelicula' => 'required|numeric|min:0',
            'file_pelicula' => 'required|max:2048|mimes:jpg,png,jpeg'
        ];
    }
}
