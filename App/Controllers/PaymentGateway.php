<?php

namespace App\Controllers;

use App\Config;
use Core\View;

class PaymentGateway extends \Core\Controller

{
    private static $api_key = Config::MOMO_PAY_API_KEY;

    public function __construct()
    {

    }

    public function testAction()
    {
        View::render('Test/test.php');
    }

    // public function process_paymentAction($phone_number, $amount, $description)
    public static function process_paymentAction()
    {
        $url = 'https://mobilemoneyapi.mtn.com/collection/v1_0/requesttopay';
        $data = [
            'phone_number' => '0552592929',
            'amount' => 10,
            'description' => 'Fried rice payment',
        ];
        $headers = [
            'Content-Type: application/json',
            'Ocp-Apim-Subscription-Key: 87c728fa540d4c91b6773b25d9316952',
            'X-Reference-Id: ' . uniqid(),
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        if (isset($data['transaction_reference'])) {
            echo 'transaction successful';
            return true;
        } else {echo "transaction failed";}
        return false;
    }
}
