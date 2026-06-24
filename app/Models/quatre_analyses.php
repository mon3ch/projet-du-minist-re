<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class quatre_analyses  extends Model
{
    protected $table = 'quatre_analyses';
    use SoftDeletes;
    protected $fillable = [
        'action_charter_id',
        'profile_id',
        'points_forts',
        'points_faibles',
        'opportunites',
        'defis',
    ];

    public function action_charter()
    {
        return $this->belongsTo(action_charter::class, 'action_charter_id');
    }
}
