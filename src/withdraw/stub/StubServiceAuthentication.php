<?php

class StubServiceAuthentication {

    public static function accountAuthenticationProvider(string $accNo) {
        if($accNo == '0987654321'){
            return array (
                'accNo' => '0987654321',
                'accName' => 'Testing Group 2',
                'accBalance' => 10,
                'accWaterCharge' => 20,
                'accElectricCharge' => 20,
                'accPhoneCharge' => 20
            );
        }
        else if ($accNo == '1234567890'){
            return array (
            'accNo' => '1234567890',
            'accName' => 'Testing Group 2',
            'accBalance' => 1000,
            'accWaterCharge' => 20,
            'accElectricCharge' => 20,
            'accPhoneCharge' => 20
            );
        }
        else {
            throw new AccountInformationException("Account number : {$accNo} not found.");
        }
    }
}