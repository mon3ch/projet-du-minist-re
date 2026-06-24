<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class etablissement_rh extends Model
{
    //
      protected $fillable = [
        'name_etablissement_id',
        'action_charter_id',
        'is_public',
        'number_male',
        'number_female',
        'grade',
        'specialisation',
        'profile_id',
    ];

    public function name_etablissement()
    {
        return $this->belongsTo(names_etablissements::class, 'name_etablissement_id');
    }

    public function action_charter()
    {
        return $this->belongsTo(action_charter::class, 'action_charter_id');
    }
}
