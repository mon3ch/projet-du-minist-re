<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class action_charter extends Model
{
    
     use SoftDeletes;

    protected $fillable = [
        'name_responsable_programme',
        'name_programmer',
        'gouvernorat_id',
        'programme_id',
        'profile_id',
        'priorite_1',
        'priorite_2',
        'priorite_3',
        'priorite_4',
        'strategie_programme',
    ];

    public function gouvernorat()
    {
        return $this->belongsTo(Gouvernorat::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
     public function etablissements()
    {
        return $this->hasMany(etablissement_sous_supervision::class, 'action_charter_id');
    }
    public function quatre_analyses()
    {
        return $this->hasMany(quatre_analyses::class);
    }
    
}
