<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ListingApprovalTest extends DuskTestCase
{

    /** @test */
    public function test_an_admin_user_can_approve_a_listing()
    {
        $user = createWithState(\App\User::class, 'admin');
        $listing = createCollection(\App\Listing::class, 3, ['is_approved' => 0]);
        $id = $listing->first()->id;

       $this->browse(function (Browser $browser) use ($user, $id) {
            $browser->loginAs($user)
                ->visit('/approvals')
                ->assertSee('Approve')
                ->waitFor('#approve-'.$id)
                ->check('#approve-'.$id)
                ->waitForReload()
                ->assertMissing('#approve-'.$id);

        });

    }
}
