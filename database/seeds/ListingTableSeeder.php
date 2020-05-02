<?php

use Illuminate\Database\Seeder;
use App\Listing;

class ListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listing = new Listing;
        $listing->name = 'MRD Inc';
        $listing->street_address = '1710 Fryar Avenue, Suite 102';
        $listing->city = 'Sumner';
        $listing->state_id = 50;
        $listing->zip = '98390';
        $listing->website = 'https:://mrdinc.com';
        $listing->tag_id = 1;
        $listing->save();

        $listing2 = new Listing;
        $listing2->name = 'USA Co.';
        $listing2->street_address = '12 American St.';
        $listing2->city = 'Delafield';
        $listing2->state_id = 52;
        $listing2->zip = '53118';
        $listing2->website = 'https:://example.org';
        $listing2->tag_id = 1;
        $listing2->save();
    }
}
