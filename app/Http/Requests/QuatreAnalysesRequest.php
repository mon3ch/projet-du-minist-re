<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuatreAnalysesRequest  extends FormRequest
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
            'action_charter_id' => 'exists:action_charters,id',
            'points_forts' => 'required|string',
            'points_faibles' => 'required|string',
            'opportunites' => 'required|string',
            'defis' => 'required|string',
        ];
    }
}
