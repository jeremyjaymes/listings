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
        $listing->cat_id = 1;
        $listing->save();
    }
}
