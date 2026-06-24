<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtablissementRHSousSupervisionRequest  extends FormRequest
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
            'name_etablissement_id' => 'required|exists:names_etablissements,id',
            'is_public' => 'required|boolean',
            'number_male' => 'required|integer', 
            'number_female' => 'required|integer',
            'grade' => 'nullable|string',
            'specialisation' => 'nullable|string',
            'action_charter_id' => 'exists:action_charters,id',
        ];
    }
}
