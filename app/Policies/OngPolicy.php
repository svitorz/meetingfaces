<?php

namespace App\Policies;

use App\Models\Ong;
use App\Models\User;

class OngPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    /**
     * Summary of isAdmin
     * @param \App\Models\Ong $ong
     * @param \App\Models\User $user
     * @return bool
     */
    public function isAdmin(Ong $ong, User $user): bool
    {
        return $ong->id_usuario === $user->id;
    }
}
