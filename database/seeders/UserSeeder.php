<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::factory()->create([
            'id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'admin' => true
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'Normal User',
            'email' => 'user@gmail.com',
        ]);
    }
}
