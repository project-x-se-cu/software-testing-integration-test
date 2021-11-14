<?php namespace Operation;

require_once __DIR__.'./../serviceauthentication/DBConnection.php';
require_once 'StubWithdrawal.php';
require_once __DIR__.'./../serviceauthentication/serviceauthentication.php';

use DBConnection;
use AccountInformationException;
use Stub\StubWithdrawal;
use ServiceAuthentication;

final class Withdrawal {
    private $accNo;

    public function __construct(string $accNo){
        $this->accNo = $accNo;
    }

    public function DriverMain(int $amount) {
        return Withdrawal::withdraw($amount);
    }

    public function withdraw(string $amount) {
        $response = array("isError" => true);
        try{

            if(!preg_match('/^[0-9]*$/',$this->accNo)){
                $response["message"] = "หมายเลขบัญชีต้องเป็นตัวเลขเท่านั้น";
            }
            elseif(!preg_match('/^[0-9\-\.]*$/',$amount)){
                $response["message"] = "จำนวนเงินถอนต้องเป็นตัวเลขเท่านั้น";
            }
            elseif(preg_match('/^.*(\\.[0-9]+)$/',$amount)){
                $response["message"] = "จำนวนเงินถอนต้องเป็นจำนวนเต็มเท่านั้น";
            }
            elseif($amount <= 0){
                $response["message"] = "จำนวนเงินถอนต้องมากกว่า 0 บาท";
            }
            elseif(strlen($this->accNo) != 10){
                $response["message"] = "หมายเลขบัญชีต้องมีครบทั้ง 10 หลัก";
            }
             elseif($amount > 50000){
                $response["message"] = "ยอดเงินที่ต้องการถอนต้องไม่เกิน 50,000 บาทต่อรายการ";
            }
            else{
                // Real
                $auth = ServiceAuthentication::accountAuthenticationProvider($this->accNo);
                // Stub
                // $auth = StubWithdrawal::serviceAuthentication($this->accNo);
                if ($auth["accBalance"] - $amount >= 0) {
                    $response = array("accNo" => $this->accNo, "accName" => $auth["accName"], "accBalance" => $auth["accBalance"] - $amount, "isError" => false);
                } else {
                    $response = array("isError" => true, "message" => "ยอดเงินในบัญชีไม่เพียงพอ");
                }
                if(!$response["isError"]) {
                    // Real
                   if(!DBConnection::saveTransaction($this->accNo, $response["accBalance"])) {
                       $response["message"] = "ไม่สามารถปรับปรุงยอดเงินได้";
                       $response["isError"] = true;
                   }
                    // Stub
                    // if(!StubWithdrawal::saveTransaction($this->accNo, $response["accBalance"])) {
                    //     $response["message"] = "ไม่สามารถปรับปรุงยอดเงินได้";
                    //     $response["isError"] = true;
                    // }
                }
            }
        }
        catch(Exception $e){
            $response["message"] = $e->getMessage(); //////////
        } catch (AccountInformationException $e) {
            $response["message"] = $e->getMessage(); //////////
        }

        return $response;
    }
}
