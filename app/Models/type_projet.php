<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class type_projet extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'nature_projet_id',
        'profile_id',
    ];


    public function nature_projet()
    {
        return $this->belongsTo(nature_projet::class, 'nature_projet_id');
    }
}
