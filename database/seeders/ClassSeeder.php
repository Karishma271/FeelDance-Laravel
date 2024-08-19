<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel;  // Make sure you're using the correct model name

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassModel::create(['class_name' => 'Bollywood', 'class_time' => '2024-08-01 18:00:00', 'video_id' => 'rFnoK6iuBEw']);
        ClassModel::create(['class_name' => 'Locking Popping', 'class_time' => '2024-08-02 17:00:00', 'video_id' => '9_LMdshcq4c']);
        // Add more seed data as needed
    }
}
