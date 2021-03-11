<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait PermissionTrait
{
    public function isOwner($userId): bool
    {
        if($userId == Auth::user()->id){
            return true;
        }
        return false;
    }
}