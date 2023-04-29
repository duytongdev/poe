<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(100)->create();
        User::factory(99)->create();
        Brand::factory(200)->create();

        User::factory()->create([
            'name' => 'Fuu',
            'email' => 'fuu@email.com',
            'role' => 'admin'
        ]);

        // Category::where('id', '<', 100)
        //     ->update(['parent_id' => rand(1, 99)]);
    }
}
