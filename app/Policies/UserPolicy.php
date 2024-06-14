<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function isAdmin(User $user)
    {
        var_dump($user);
        return $user->roles->contains('name', 'Admin');
    }
}
