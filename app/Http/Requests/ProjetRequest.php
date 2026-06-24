<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetRequest extends FormRequest
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
        'nom_projet' => 'max:255',
        'description' => 'string|max:255',
        'details_projet' => 'string|max:255',
        'date' => 'string|max:4',
        'estimation_budgetaire' => 'string|max:255',
        'date_annance_offre' => 'nullable',
        'date_ouverture_appele_offre' => 'nullable',
        'cout_marche' => 'max:255',
        'date_debut' => 'nullable',
        'duree' => 'nullable',
        'pourcentage_avancement' => 'nullable',
        'date_acceptation_temporaire' => 'nullable',
        'Remarque' => 'nullable|string|max:255',
        'gouvernorat_id' => 'exists:gouvernorats,id',
        'delegation_id' => 'exists:delegations,id',
        'financement_id' => 'exists:financements,id',
        'etablissement_id' => 'exists:etablissements,id',
        'nature_projet_id' => 'exists:nature_projets,id',
        'type_projet_id' => 'exists:type_projets,id',
        'name_etablissement_id' => 'exists:names_etablissements,id',
        'programme_id' => 'exists:programmes,id',
        'type_etablissement' => 'nullable|string|max:255',
        'situation_etablissement_fonctionnelle' => 'nullable|string|max:255',
        'tranche' => 'nullable|string|max:255',
        'situation_immobiliere' => 'required|string|max:255',
        'credit_recommande_Payeur'  => 'nullable|string|between:1,9999', //الاعتمادات المرصودة (أ.د) (دفعا)
        'credit_recommande_engager'  => 'required|string|between:1,9999',//الاعتمادات المرصودة (أ.د) (تعهدا)/أو الكلفة التقديرية للمشروع
        'phase_projet' => 'required|string|max:255',
        'date_fin_travaux' => 'nullable',
        'date_acceptation_finale' => 'nullable',
        'etat_etablissement' => 'string|max:255',
        'latitude' => 'nullable|numeric|between:-90,90',
        'longitude' => 'nullable|numeric|between:-180,180',
        ];
    }
}
