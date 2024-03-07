<?php

namespace App\Domain\Wallet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "current_money_amount"
    ];
}
