<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeType extends Model
{
    protected $fillable = [
        'frequency',
        'description'
    ];

    public function incometypes()
    {
        return $this->hasMany(Income::class, 'income_type_id');
    }
}
