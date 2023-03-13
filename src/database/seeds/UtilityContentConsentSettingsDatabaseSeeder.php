<?php

namespace Corals\Modules\Utility\ContentConsent\database\seeds;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilityContentConsentSettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'code' => 'utility_days_of_the_week',
                'type' => 'SELECT',
                'label' => 'Days of the week',
                'value' => '{"Mon":"Mon","Tue":"Tue","Wed":"Wed","Thu":"Thu","Fri":"Fri","Sat":"Sat","Sun":"Sun"}',
                'editable' => 1,
                'hidden' => 0,
                'category' => 'Utilities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
