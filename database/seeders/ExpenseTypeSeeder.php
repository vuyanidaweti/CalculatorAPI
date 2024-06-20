<?php

namespace Database\Seeders;

use App\Models\ExpenseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ExpenseType::factory()->create([
            'name' => 'food',
            'amount' => 400,
            'description' => 'Weekly groceries',
            'expense_type_id' => 1
        ]);
    }
}
