<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::create(['name' => 'Aarav Patel', 'email' => 'aarav.patel@example.com', 'role' => 'Student', 'image' => '1.jpg', 'class_id' => 1]);

    }
}
