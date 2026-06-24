<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'is_active',
        'image',
        'gouvernorat_id',
        'captcha_code' => 'required|string',

    ];

    public function gouvernorat()
    {
        return $this->belongsTo(Gouvernorat::class, 'gouvernorat_id');
    }
}

