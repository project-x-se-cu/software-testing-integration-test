<?php namespace Stub;

final class StubWithdrawal {
    public static function serviceAuthentication() {
        return array (
            'accNo' => '1111111111',
            'accName' => 'Testing Group 2',
            'accBalance' => 500,
            'accWaterCharge' => 20,
            'accElectricCharge' => 20,
            'accPhoneCharge' => 20
        );
    }

    public static function saveTransaction() {
        return true;
    }
}
