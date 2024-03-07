<?php

namespace App\Domain\Wallet;

use App\Core\Controller\SearchController;

class WalletSearchController extends SearchController
{
    public function __construct(WalletRepository $walletRepository)
    {
        return parent::__construct($walletRepository);
    }
}
