<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ListingTest extends TestCase
{
    use RefreshDatabase,
        WithFaker;

    public function setUp() : void
    {
        parent::setUp();
        $this->seed(\StatesTableSeeder::class);
    }

    /** @test */
    public function test_listings_are_displayed_on_home_page()
    {
        $listing = factory(\App\Listing::class)->create();

        $response = $this->get('/');
        $response->assertStatus(200)
                ->assertViewHasAll(['listings']);
    }

    public function test_listings_can_be_created()
    {
        $tag = factory(\App\Tag::class)->create();
        $request = [
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'contact_email' => $this->faker->safeEmail,
            'street_address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'zip' => $this->faker->postcode,
            'state_id' => 52,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->safeEmailDomain,
            'tag_id' => $tag->id,
        ];

        $response = $this->post('/listings', $request);
        $response->assertJson([
            'message' => 'Your listing has been submitted, you will be notified when it is approved.'
        ]);
    }

    public function test_a_listing_can_be_edited_by_admin()
    {
        $this->signInAsAdmin();
        $listing = factory(\App\Listing::class)->create();

        $this->get('/listings/' . $listing->id . '/edit')
            ->assertStatus(200);
    }

    public function test_a_listing_can_not_be_edited_by_user()
    {
        $this->signIn();
        $listing = factory(\App\Listing::class)->create();

        $this->get('/listings/' . $listing->id . '/edit')
            ->assertStatus(403);
    }

    public function test_a_listing_can_be_deleted_by_admin()
    {
        $this->signInAsAdmin();
        $listing = factory(\App\Listing::class)->create();

        $this->delete('/listings/' . $listing->id)
            ->assertStatus(201);
    }

    public function test_a_listing_can_not_be_deleted_by_user()
    {
        $this->signIn();
        $listing = factory(\App\Listing::class)->create();

        $this->delete('/listings/' . $listing->id)
            ->assertStatus(403);
    }
}
