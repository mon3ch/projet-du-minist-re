<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etablissement extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'programme_id',
        'profile_id',
    ];
    
    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
    }
}
