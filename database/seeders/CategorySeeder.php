<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \DB::table('categories')->insert([
        //     'name' => Str::random(10),
        //     'image' => Str::random(10).'jpg',
        //     'prodect_id' => null,
        //     'description' => Str::random(10),
        // ]);

        Category::factory(20)->create();
    }
}
