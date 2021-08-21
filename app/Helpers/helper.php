<?php

use Illuminate\Support\Facades\Auth;


if (!function_exists('hasAnyPermissions')) {

    function hasAnyPermissions($permission): bool
    {
        return Auth::guard('admin')->user()->hasPermission($permission);
    }
}

if(!function_exists('activityLog')) {
    function activityLog($message) 
    {
        $id = auth()->guard('admin')->user()->id;
        $name = auth()->guard('admin')->user()->name;
        activity()
            ->causedBy(auth()->guard('admin')->user())
            ->log("Admin #{$id}- name: {$name} {$message}");
    }
}






?>