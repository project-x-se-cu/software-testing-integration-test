<?php

use Operation\Withdrawal;

require_once __DIR__.'./../../../src/withdraw/Withdrawal.php';
require_once __DIR__.'./../../../src/withdraw/stub/StubServiceAuthentication.php';
require_once __DIR__.'./../../../src/withdraw/stub/StubDBConnection.php';

class DriverMainStepOne extends Withdrawal {

    public function accountAuthenticationProvider(string $accNo) {
        return StubServiceAuthentication::accountAuthenticationProvider($accNo);
    }

    public function saveTransaction(string $accNo, int $accBalance) {
        return StubDBConnection::saveTransaction($accNo, $accBalance);;
    }
}