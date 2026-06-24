<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nature_projet extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'name',
        'profile_id',
    ];
    
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
