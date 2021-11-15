<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__.'./../../src/withdraw/driver/DriverMainStepOne.php';
require_once __DIR__.'./../../src/withdraw/driver/DriverMainStepThree.php';

final class WithdrawalTest extends TestCase {
    
    /** @test */
    function given_AccountNumber_when_Withdraw_then_ReturnSuccess() {
        // given
        $driverMainStepOne = new DriverMainStepOne('1234567890');
        $expectedResult = array (
            'isError' => false,
            'accNo' => '1234567890',
            'accName' => 'Testing Group 2',
            'accBalance' => 999999800
        );

        // when
        $actualResult = $driverMainStepOne->withdraw(200);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

        /** @test */
        function test() {
            // given
            $driverMainStepThree = new DriverMainStepThree('1234567890');
            $expectedResult = array (
                'isError' => false,
                'accNo' => '1234567890',
                'accName' => 'Testing Group 2',
                'accBalance' => 999999800
            );
    
            // when
            $actualResult = $driverMainStepThree->withdraw(200);
    
            // then
            $this->assertEquals($expectedResult, $actualResult);
        }
}