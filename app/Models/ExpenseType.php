<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function expenses()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id');
    }
}
