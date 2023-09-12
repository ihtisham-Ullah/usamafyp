<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Domain::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = file('public/assets/data.csv');

        foreach ($csvFile as $line) {
            $domain = trim(explode(',', $line)[0]);
            Domain::factory()->create([
                'name' => $domain,
            ]);
        }
    }
}
