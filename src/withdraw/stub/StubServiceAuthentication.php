<?php

class StubServiceAuthentication {

    public static function accountAuthenticationProvider(string $accNo) {
        return array (
            'accNo' => '1234567890',
            'accName' => 'Testing Group 2',
            'accBalance' => 1000000000,
            'accWaterCharge' => 20,
            'accElectricCharge' => 20,
            'accPhoneCharge' => 20
        );
    }
}