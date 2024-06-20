<?php

namespace Database\Seeders;

use App\Models\SavingsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavingsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SavingsType::factory()->create([
            'name' => 'Weekly ',
            'description' => 'Weekly savings'
        ]);
    }
}
