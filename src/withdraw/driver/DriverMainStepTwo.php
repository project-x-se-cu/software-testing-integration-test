<?php

use Operation\Withdrawal;

require_once __DIR__.'./../../../src/withdraw/Withdrawal.php';
require_once __DIR__.'./../../../src/withdraw/stub/StubDBConnection.php';

class DriverMainStepTwo extends Withdrawal {

    public function saveTransaction(string $accNo, int $accBalance) {
        return StubDBConnection::saveTransaction($accNo, $accBalance);;
    }
}