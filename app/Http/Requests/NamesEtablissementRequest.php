<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NamesEtablissementRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'etablissement_id' => 'required|exists:etablissements,id',
            'gouvernorat_id' => 'required|exists:gouvernorats,id',
        ];
    }
}
