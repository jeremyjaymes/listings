<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListingTest extends TestCase
{
    use RefreshDatabase,
        WithFaker;

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
            'email' => $this->faker->unique()->safeEmail,
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
}
