<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class names_etablissements extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'etablissement_id',
        'gouvernorat_id',
        'profile_id',
    ];
    
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');
    }

    public function gouvernorat()
    {
        return $this->belongsTo(Gouvernorat::class, 'gouvernorat_id');
    }

}
