<?php

namespace Database\Seeders;

use App\Models\Element;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elements = file_get_contents(storage_path('app/json/elements.json'));
        $elements = json_decode($elements);

        foreach ($elements as $element) {
            Element::firstOrCreate([
                'name' => $element->name,
            ]);
        }
    }
}
