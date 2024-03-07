<?php

namespace App\Domain\Wallet;

use App\Core\Repository\Repository;

class WalletRepository extends Repository
{
    public function __construct(WalletModel $walletModel)
    {
        return parent::__construct($walletModel);
    }
}
