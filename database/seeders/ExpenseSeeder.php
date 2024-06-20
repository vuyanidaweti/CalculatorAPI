<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Expense::factory()->create([
            'name' => 'food',
            'amount' => 400,
            'description' => 'Weekly groceries',
            'expense_type_id' => 1
        ]);
    }
}
