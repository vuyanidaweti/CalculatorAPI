<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savings extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
    ];

    public function savingsTypes()
    {
        return $this->belongsTo(SavingsType::class, 'savings_type_id');
    }
}
