<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Education', 'Health', 'Flood', 'Disaster Relief', 'Food', 'School Bag', 'Water Tubewell'];
        foreach ($categories as $cat) {
            Category::create(['name' => $cat]);
        }
    }
}
