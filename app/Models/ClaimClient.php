<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimClient extends Model
{
    use HasFactory;

    protected $fillable=[
      'client_id','credit_product_id',
      'summa','period',
    ];
}
