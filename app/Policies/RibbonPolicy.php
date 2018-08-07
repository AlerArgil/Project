<?php

namespace App\Policies;

use App\User;
use App\Ribbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class RibbonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, Ribbon $ribbon)
    {
        return $user->id === $ribbon->user_id;
    }
}
