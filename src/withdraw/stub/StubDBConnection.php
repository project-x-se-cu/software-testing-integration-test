<?php

class StubDBConnection {

    public static function saveTransaction(string $accNo, int $accBalance) {
        return true;
    }
}