<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delegation extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'name',
        'gouvernorat_id',
        'profile_id',
    ];

    public function gouvernorat()
    {
        return $this->belongsTo(Gouvernorat::class, 'gouvernorat_id');
    }
}
