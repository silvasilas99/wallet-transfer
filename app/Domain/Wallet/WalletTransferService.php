<?php

namespace App\Domain\Wallet;

class WalletTransferService {
    /**
     * Transfer the $valueToTransfer from $payer to $payee
     * @param string $payerId
     * @param string $payerId
     * @param float $valueToTransfer
     *
     * @return void
     */
    public function transferBetweenUserWallets(
        string $payerId,
        string $payeeId,
        float $valueToTransfer
    ) {
        // Search for users wallets, then make some validations before update the wallets objects with the new values
    }

    /**
     * Check if user can transfer between wallets
     * @param string $userId (this should be an UUID)
     * @return void
     */
    private function checkIfUserCanTransfer(string $userId)
    {
        // If user is logist, block the action
    }
}
