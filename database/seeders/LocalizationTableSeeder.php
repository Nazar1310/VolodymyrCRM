<?php

namespace Database\Seeders;

use App\Models\Localization;
use Illuminate\Database\Seeder;

class LocalizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Localization::updateOrCreate([
            'origin' => 'login_wrong',
            'en' => '',
            'ua' => '',
        ]);
    }
}
