<?php

namespace Tests\Feature;

use App\Mail\ListingApproved;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ApprovalsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();
        $this->seed(\StatesTableSeeder::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_listing_can_be_approved()
    {
        Mail::fake();

        $this->signInAsAdmin();
        $listing = factory(\App\Listing::class)->create();

        $response = $this->post('/approvals/' . $listing->id);
        $response->assertStatus(200)
            ->assertJson(['message' => 'Listing has been published.']);

        Mail::assertSent(ListingApproved::class);
    }
}
