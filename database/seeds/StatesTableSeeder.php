<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['name' => 'Alaska', 'abbrev' => 'AK']);
        State::create(['name' => 'Alabama', 'abbrev' => 'AL']);
        State::create(['name' => 'Arizona', 'abbrev' => 'AZ']);
        State::create(['name' => 'Arkansas', 'abbrev' => 'AR']);
        State::create(['name' => 'California', 'abbrev' => 'CA']);
        State::create(['name' => 'Colorado', 'abbrev' => 'CO']);
        State::create(['name' => 'Connecticut', 'abbrev' => 'CT']);
        State::create(['name' => 'Delaware', 'abbrev' => 'DE']);
        State::create(['name' => 'District of Columbia', 'abbrev' => 'DC']);
        State::create(['name' => 'Florida', 'abbrev' => 'FL']);
        State::create(['name' => 'Georgia', 'abbrev' => 'GA']);
        State::create(['name' => 'Guam', 'abbrev' => 'GU']);
        State::create(['name' => 'Hawaii', 'abbrev' => 'HI']);
        State::create(['name' => 'Idaho', 'abbrev' => 'ID']);
        State::create(['name' => 'Illinois', 'abbrev' => 'IL']);
        State::create(['name' => 'Indiana', 'abbrev' => 'IN']);
        State::create(['name' => 'Iowa', 'abbrev' => 'IA']);
        State::create(['name' => 'Kansas', 'abbrev' => 'KS']);
        State::create(['name' => 'Kentucky', 'abbrev' => 'KY']);
        State::create(['name' => 'Louisiana', 'abbrev' => 'LA']);
        State::create(['name' => 'Maine', 'abbrev' => 'ME']);
        State::create(['name' => 'Maryland', 'abbrev' => 'MD']);
        State::create(['name' => 'Massachusetts', 'abbrev' => 'MA']);
        State::create(['name' => 'Michigan', 'abbrev' => 'MI']);
        State::create(['name' => 'Minnesota', 'abbrev' => 'MN']);
        State::create(['name' => 'Mississippi', 'abbrev' => 'MS']);
        State::create(['name' => 'Missouri', 'abbrev' => 'MO']);
        State::create(['name' => 'Montana', 'abbrev' => 'MT']);
        State::create(['name' => 'Nebraska', 'abbrev' => 'NE']);
        State::create(['name' => 'Nevada', 'abbrev' => 'NV']);
        State::create(['name' => 'New Hampshire', 'abbrev' => 'NH']);
        State::create(['name' => 'New Jersey', 'abbrev' => 'NJ']);
        State::create(['name' => 'New Mexico', 'abbrev' => 'NM']);
        State::create(['name' => 'New York', 'abbrev' => 'NY']);
        State::create(['name' => 'North Carolina', 'abbrev' => 'NC']);
        State::create(['name' => 'North Dakota', 'abbrev' => 'ND']);
        State::create(['name' => 'Ohio', 'abbrev' => 'OH']);
        State::create(['name' => 'Oklahoma', 'abbrev' => 'OK']);
        State::create(['name' => 'Oregon', 'abbrev' => 'OR']);
        State::create(['name' => 'Pennsylvania', 'abbrev' => 'PA']);
        State::create(['name' => 'Puerto Rico', 'abbrev' => 'PR']);
        State::create(['name' => 'Rhode Island', 'abbrev' => 'RI']);
        State::create(['name' => 'South Carolina', 'abbrev' => 'SC']);
        State::create(['name' => 'South Dakota', 'abbrev' => 'SD']);
        State::create(['name' => 'Tennessee', 'abbrev' => 'TN']);
        State::create(['name' => 'Texas', 'abbrev' => 'TX']);
        State::create(['name' => 'Utah', 'abbrev' => 'UT']);
        State::create(['name' => 'Vermont', 'abbrev' => 'VT']);
        State::create(['name' => 'Virginia', 'abbrev' => 'VA']);
        State::create(['name' => 'Washington', 'abbrev' => 'WA']);
        State::create(['name' => 'West Virginia', 'abbrev' => 'WV']);
        State::create(['name' => 'Wisconsin', 'abbrev' => 'WI']);
        State::create(['name' => 'Wyoming', 'abbrev' => 'WY']);
    }
}
