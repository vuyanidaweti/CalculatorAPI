<?php

namespace Database\Seeders;

use App\Models\Savings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Savings::factory()->create([
            'name' => 'Car savings ',
            'amount' => 2000,
            'description' => 'weekly savings',
            'savings_type_id' => 1
        ]);
    }
}
