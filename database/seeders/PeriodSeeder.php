<?php

namespace Database\Seeders;

use App\Enums\PeriodStatus;
use App\Models\Period;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Period::first()) {
            Period::create(['status' => PeriodStatus::Close]);
        }
    }
}
