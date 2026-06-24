<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projet extends Model
{
    
    use SoftDeletes;
    protected $fillable = [
        'nom_projet', 
        'gouvernorat_id', 
        'delegation_id', 
        'programme_id', 
        'etablissement_id', 
        'description', 
        'details_projet',  
        'nature_projet_id',
        'type_projet_id',
        'name_etablissement_id',
        'situation_etablissement_fonctionnelle', 
        'tranche', 
        'date', 
        'situation_immobiliere', 
        'financement_id', 
        'estimation_budgetaire',   
        'cout_marche', 
        'credit_recommande_Payeur', 
        'credit_recommande_engager',
        'pourcentage_avancement', 
        'phase_projet', 
        'Remarque', 
        'date_annance_offre', 
        'date_debut', 
        'duree', 
        'date_fin_travaux', 
        'date_acceptation_temporaire', 
        'date_acceptation_finale', 
        'latitude',
        'longitude',
        'profile_id',

    ];

    public function gouvernorat()
    {
        return $this->belongsTo(Gouvernorat::class);
    }

    public function delegation()
    {
        return $this->belongsTo(Delegation::class);
    }

    public function financement()
    {
        return $this->belongsTo(Financement::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');
    }

    public function nature_projet()
    {
        return $this->belongsTo(nature_projet::class, 'nature_projet_id');
    }

    public function type_projet()
    {
        return $this->belongsTo(type_projet::class, 'type_projet_id');
    }
    
    public function name_etablissement()
    {
        return $this->belongsTo(names_etablissements::class, 'name_etablissement_id');
    }
}
