<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionCharterRequest extends FormRequest
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
            'gouvernorat_id' => 'required|exists:gouvernorats,id',
            'programme_id' => 'required|exists:programmes,id',
            'name_responsable_programme' => 'required|string',
            'name_programmer' => 'required|string',
            'profile_id' => 'exists:profiles,id',
            'priorite_1' => 'required|string',
            'priorite_2' => 'nullable|string',
            'priorite_3' => 'nullable|string',
            'priorite_4' => 'nullable|string',
            'strategie_programme' => 'required|string',    
        ];
    }
}
