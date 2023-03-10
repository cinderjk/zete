<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MessageLog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => bcrypt('123'),
        ]);
        $admin->api_key = $admin->createToken('admin')->plainTextToken;
        $admin->save();
        // Device::factory(5)->create();
        MessageLog::factory(25)->create();

        $this->call([
            GroupSeeder::class,
            ContactSeeder::class,
        ]);
    }
}
