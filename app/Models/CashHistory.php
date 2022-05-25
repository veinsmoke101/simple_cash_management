<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashHistory extends Model
{

    use HasFactory;

    protected $table = 'cash_history';
    protected $fillable = ['label', 'type', 'transaction_amount', 'balance'];
}
