<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('checkPermission')) {
    function checkPermission($data)
    {
        if (Auth::id() !== $data->profile_id) {
            abort(403, 'Accès refusé');
        }
    }
}
