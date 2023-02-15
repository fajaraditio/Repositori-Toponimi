<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = file_get_contents(storage_path('app/json/categories.json'));
        $categories = json_decode($categories);

        foreach ($categories as $category) {
            Category::firstOrCreate([
                'name' => $category->name,
            ]);
        }
    }
}
