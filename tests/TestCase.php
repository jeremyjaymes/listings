<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create a user and sign in.
     */
    protected function signIn($user = null)
    {
        $user = $user ?: create(\App\User::class);
        $this->actingAs($user);

        return $this;
    }

    /**
     * Create a user and sign in as admin
     */
    protected function signInAsAdmin($user = null)
    {
        $user = $user ?: createWithState(\App\User::class, 'admin');
        $this->actingAs($user);

        return $this;
    }
}
