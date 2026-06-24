<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class voiture_etablissement extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'type_voiture',
        'categorie',
        'date_premier_circulation',
        'matriculation',
        'action_charter_id',
        'gouvernorat_id',
        'name_etablissement_id',
        'suivi_voiture',
        'profile_id',
    ];

    public function action_charter()
    {
        return $this->belongsTo(action_charter::class, 'action_charter_id');
    }

    public function gouvernorat()
    {
        return $this->belongsTo(Gouvernorat::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function name_etablissement()
    {
        return $this->belongsTo(names_etablissements::class, 'name_etablissement_id');
    }
}

