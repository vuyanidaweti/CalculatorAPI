<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsType extends Model
{
    protected $fillable = [
        'name',
        'descriptions'
    ];

    public function savings()
    {
        return $this->hasMany(Savings::class, 'savings_type_id');
    }
}
