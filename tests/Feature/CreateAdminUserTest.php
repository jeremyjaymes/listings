<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAdminUserTest extends TestCase
{
    use WithFaker,
        RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_admin_user()
    {
        $this->artisan('create:admin')
            ->expectsQuestion('Name', $this->faker()->name)
            ->expectsQuestion('Email', $this->faker()->safeEmail)
            ->expectsQuestion('Password', 'password')
            ->expectsQuestion('Admin', true)
            ->assertExitCode(0);
    }
}
