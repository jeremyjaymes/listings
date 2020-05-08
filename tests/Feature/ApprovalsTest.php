<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApprovalsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_listing_can_be_approved()
    {
        $listing = factory(\App\Listing::class)->create();

        $response = $this->post('/approvals/' . $listing->id);
        $response->assertStatus(200)
            ->assertJson(['message' => 'Listing has been published.']);
    }
}
