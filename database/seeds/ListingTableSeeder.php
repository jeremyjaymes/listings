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
        $listing->name = 'Steel Manufacturing';
        $listing->description = 'Bacon ipsum dolor amet boudin shoulder spare ribs shankle kevin kielbasa swine, beef
        ground round pork chop meatloaf. Bresaola cupim venison sausage porchetta prosciutto. Pork belly pancetta shank
        turkey tongue tri-tip short loin bacon fatback pork. Beef short ribs flank ham ham hock turducken short
        loin chislic pork brisket meatball pork chop hamburger shoulder landjaeger.';
        $listing->street_address = '12 South St.';
        $listing->city = 'Seattle';
        $listing->state_id = 50;
        $listing->zip = '98390';
        $listing->phone = '2222222222';
        $listing->company_email = 'hello@papertreedesign.com';
        $listing->website = 'https:://example.org';
        $listing->contact_email = 'jeremy@papertreedesign.com';
        $listing->is_approved = true;
        $listing->tag_id = 1;
        $listing->save();

        $listing2 = new Listing;
        $listing2->name = 'USA Co.';
        $listing2->street_address = '12 American St.';
        $listing2->city = 'Delafield';
        $listing2->state_id = 52;
        $listing2->zip = '53118';
        $listing->phone = '2222222222';
        $listing->company_email = 'hello@papertreedesign.com';
        $listing2->website = 'https:://example.org';
        $listing2->contact_email = 'jeremy@papertreedesign.com';
        $listing2->is_approved = true;
        $listing2->tag_id = 1;
        $listing2->save();
    }
}
