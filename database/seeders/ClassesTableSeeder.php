<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = file_get_contents(storage_path('app/json/classes.json'));
        $classes = json_decode($classes);

        foreach ($classes as $class) {
            Classes::firstOrCreate([
                'name' => $class->name,
            ]);
        }
    }
}
