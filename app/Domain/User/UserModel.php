<?php

namespace App\Domain\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "fullname",
        "cpf",
        "email",
        "password",
        "is_shopkeeper"
    ];
}
