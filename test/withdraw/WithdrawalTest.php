<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__.'./../../src/withdraw/driver/DriverMainStepOne.php';
require_once __DIR__.'./../../src/withdraw/driver/DriverMainStepTwo.php';
require_once __DIR__.'./../../src/withdraw/driver/DriverMainStepThree.php';

final class WithdrawalTest extends TestCase {

    function testcase1() {
        // given
        $driverMainStepOne = new DriverMainStepOne('1234567890');
        $expectedResult = array (
            'isError' => false,
            'accNo' => '1234567890',
            'accName' => 'Testing Group 2',
            'accBalance' => 900
        );

        // when
        $actualResult = $driverMainStepOne->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase2() {
        // given
        $driverMainStepOne = new DriverMainStepOne('0987654321');
        $expectedResult = array (
            'isError' => true,
            'message' => 'ยอดเงินในบัญชีไม่เพียงพอ'
        );

        // when
        $actualResult = $driverMainStepOne->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase3() {
        // given
        $driverMainStepOne = new DriverMainStepOne('0000000000');
        $expectedResult = array (
            'isError' => true,
            'message' => 'Account number : 0000000000 not found.'
        );

        // when
        $actualResult = $driverMainStepOne->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase4() {
        // given
        $driverMainStepOne = new DriverMainStepOne('1234567890');
        $expectedResult = array (
            'isError' => true,
            'message' => 'จำนวนเงินถอนต้องเป็นตัวเลขเท่านั้น'
        );

        // when
        $actualResult = $driverMainStepOne->withdraw('10a');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase5() {
        // given
        $driverMainStepOne = new DriverMainStepOne('123456789');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องมีครบทั้ง 10 หลัก'
        );

        // when
        $actualResult = $driverMainStepOne->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase6() {
        // given
        $driverMainStepOne = new DriverMainStepOne('12345678901');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องมีครบทั้ง 10 หลัก'
        );

        // when
        $actualResult = $driverMainStepOne->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase7() {
        // given
        $driverMainStepOne = new DriverMainStepOne('123456789a');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องเป็นตัวเลขเท่านั้น'
        );

        // when
        $actualResult = $driverMainStepOne->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase8() {
        // given
        $driverMainStepTwo = new DriverMainStepTwo('1234567890');
        $expectedResult = array (
            'isError' => false,
            'accNo' => '1234567890',
            'accName' => 'Testing Group 2',
            'accBalance' => 900
        );

        // when
        $actualResult = $driverMainStepTwo->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase9() {
        // given
        $driverMainStepTwo = new DriverMainStepTwo('0987654321');
        $expectedResult = array (
            'isError' => true,
            'message' => 'ยอดเงินในบัญชีไม่เพียงพอ'
        );

        // when
        $actualResult = $driverMainStepTwo->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase10() {
        // given
        $driverMainStepTwo = new DriverMainStepTwo('0000000000');
        $expectedResult = array (
            'isError' => true,
            'message' => 'Account number : 0000000000 not found.'
        );

        // when
        $actualResult = $driverMainStepTwo->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase11() {
        // given
        $driverMainStepTwo = new DriverMainStepTwo('1234567890');
        $expectedResult = array (
            'isError' => true,
            'message' => 'จำนวนเงินถอนต้องเป็นตัวเลขเท่านั้น'
        );

        // when
        $actualResult = $driverMainStepTwo->withdraw('10a');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase12() {
        // given
        $driverMainStepTwo = new DriverMainStepTwo('123456789');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องมีครบทั้ง 10 หลัก'
        );

        // when
        $actualResult = $driverMainStepTwo->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase13() {
        // given
        $driverMainStepTwo = new DriverMainStepTwo('12345678901');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องมีครบทั้ง 10 หลัก'
        );

        // when
        $actualResult = $driverMainStepTwo->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase14() {
        // given
        $driverMainStepTwo = new DriverMainStepTwo('123456789a');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องเป็นตัวเลขเท่านั้น'
        );

        // when
        $actualResult = $driverMainStepTwo->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase15() {
        // given
        $driverMainStepThree = new DriverMainStepThree('1234567890');
        $expectedResult = array (
            'isError' => false,
            'accNo' => '1234567890',
            'accName' => 'Testing Group 2',
            'accBalance' => 900
        );

        // when
        $actualResult = $driverMainStepThree->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
        $this->resetTestData($driverMainStepThree);
    }

    function testcase16() {
        // given
        $driverMainStepThree = new DriverMainStepThree('0987654321');
        $expectedResult = array (
            'isError' => true,
            'message' => 'ยอดเงินในบัญชีไม่เพียงพอ'
        );

        // when
        $actualResult = $driverMainStepThree->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase17() {
        // given
        $driverMainStepThree = new DriverMainStepThree('0000000000');
        $expectedResult = array (
            'isError' => true,
            'message' => 'Account number : 0000000000 not found.'
        );

        // when
        $actualResult = $driverMainStepThree->withdraw(100);

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase18() {
        // given
        $driverMainStepThree = new DriverMainStepThree('1234567890');
        $expectedResult = array (
            'isError' => true,
            'message' => 'จำนวนเงินถอนต้องเป็นตัวเลขเท่านั้น'
        );

        // when
        $actualResult = $driverMainStepThree->withdraw('10a');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase19() {
        // given
        $driverMainStepThree = new DriverMainStepThree('123456789');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องมีครบทั้ง 10 หลัก'
        );

        // when
        $actualResult = $driverMainStepThree->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase20() {
        // given
        $driverMainStepThree = new DriverMainStepThree('12345678901');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องมีครบทั้ง 10 หลัก'
        );

        // when
        $actualResult = $driverMainStepThree->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testcase21() {
        // given
        $driverMainStepThree = new DriverMainStepThree('123456789a');
        $expectedResult = array (
            'isError' => true,
            'message' => 'หมายเลขบัญชีต้องเป็นตัวเลขเท่านั้น'
        );

        // when
        $actualResult = $driverMainStepThree->withdraw('100');

        // then
        $this->assertEquals($expectedResult, $actualResult);
    }

    function resetTestData($driverMainStepThree) {
        $driverMainStepThree->saveTransaction('1234567890', 1000);
    }
}