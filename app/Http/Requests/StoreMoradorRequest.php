<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreMoradorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role() === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome_completo' => 'max:128|string|nullable',
            'cidade_atual' => 'max:128|string|nullable',
            'cidade_natal' => 'max:128|string|nullable',
            'nome_familiar_proximo' => 'max:128|string|nullable',
            'grau_parentesco' => 'max:128|string|nullable',
            'data_nasc' => 'max:128|string|nullable',
        ];
    }
}
