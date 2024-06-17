<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Income::factory()->create([
            'name'=>'salary',
            'amount'=>56000,
            'description'=>'This a monthly income',
            'income_type_id'=>1
        ]);

    }
}
