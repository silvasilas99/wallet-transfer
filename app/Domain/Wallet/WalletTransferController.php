<?php

namespace App\Domain\Wallet;

use App\Core\Controller\Controller;
use Illuminate\Http\Request;

class WalletTransferController extends Controller
{
    public function __construct(WalletRepository $walletRepository)
    {
        return parent::__construct($walletRepository);
    }

    public function transfer (Request $request)
    {
        // Use the service WalletTransferService to make the transference
    }

}
