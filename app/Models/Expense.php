<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'expense_type_id'
    ];

    public function expensetypes()
    {
        return $this->hasMany(Expense::class, 'expense_type_id');
    }
}
