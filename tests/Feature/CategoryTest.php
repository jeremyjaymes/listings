<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

   public function test_admin_can_create_category()
   {
       $this->signInAsAdmin();

       $request = [
           'name' => 'Test Category'
       ];

       $this->post('/categories', $request)
           ->assertStatus(200)
           ->assertJson(['message' => 'Category created.']);
   }
}
