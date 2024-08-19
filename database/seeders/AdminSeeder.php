<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'feel',
            'email' => 'feeldance@example.com',
            'first_name' => 'Karishma',
            'last_name' => 'Patel',
            'password' => bcrypt('feel'),
        ]);
        
    }
}
