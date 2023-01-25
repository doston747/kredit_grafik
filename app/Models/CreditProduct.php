<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditProduct extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'max_period',
        'max_summa',
        'percent'
    ];
}
