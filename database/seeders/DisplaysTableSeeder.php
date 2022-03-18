<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Display;
use Illuminate\Database\Seeder;

class DisplaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Display::factory()
            ->for(Company::query()->inRandomOrder()->first())
            ->create();

        Display::factory()
            ->for(Company::query()->inRandomOrder()->first())
            ->create();

        Display::factory()
            ->for(Company::query()->inRandomOrder()->first())
            ->create();

        Display::factory()
            ->for(Company::query()->inRandomOrder()->first())
            ->create();

        Display::factory()
            ->for(Company::query()->inRandomOrder()->first())
            ->create();
    }
}
