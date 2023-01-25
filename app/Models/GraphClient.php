<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphClient extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'credit_product_id',
        'claim_client_id',
        'ordering',
        'paid',
        'loan',
        'month',
        'total_loan',
        'percent_loan'

    ];

}
