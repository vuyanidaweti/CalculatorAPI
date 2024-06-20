<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'amount',
        'income_type_id',
        'description'
    ];

    public function incometypes()
    {
        return $this->belongsTo(IncomeType::class, 'income_type_id');
    }

    public function canEdit()
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('client')) {
            return true;
        }

        return false;
    }
}
