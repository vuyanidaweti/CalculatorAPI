<?php

namespace Database\Seeders;

use App\Models\IncomeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        IncomeType::factory()->create([
            'name'=>'salary',
            'frequency'=>'monthly',
            'description'=>'This is a monthly account'
        ]);
    }
}
