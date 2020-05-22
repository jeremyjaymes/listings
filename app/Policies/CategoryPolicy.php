<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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

    public function before(User $user)
    {
        \Log::info($user->is_admin);
        return $user->is_admin;
    }

    public function update(User $user)
    {
        return $user->is_admin;
    }
}
