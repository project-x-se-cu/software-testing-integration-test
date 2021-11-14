<?php

use PHPUnit\Framework\TestCase;
use Operation\Withdrawal;

require_once __DIR__.'./../../src/withdraw/Withdrawal.php';

final class WithdrawalTest extends TestCase {
    function test() {
        $actualResult = new Withdrawal('1111111111');
        $expectedResult = array (
            'isError' => false,
            'accNo' => '1111111111',
            'accName' => 'Testing Group 2',
            'accBalance' => 300
        );
        $this->assertEquals($expectedResult, $actualResult->DriverMain(200));
    }
}

1. แก้ db ให้ตาม test plan + แก้ driver
2. reset db + แก้ stub