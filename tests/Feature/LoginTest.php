<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_redirect_to_main_page_after_login()
    {
        $user = create(\App\User::class, ['password' => 'secret']);

        $request = [
            'email' => $user->email,
            'password' => 'secret'
        ];

        $this->post('/login', $request)
            ->assertRedirect('/');
    }
}
