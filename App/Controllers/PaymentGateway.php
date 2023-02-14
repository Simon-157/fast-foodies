<?php

namespace App\Controller;

class MobileMoneyPaymentGateway extends \Core\Controller

{
    private $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function process_payment($phone_number, $amount, $description)
    {
        $request = [
            'phone_number' => $phone_number,
            'amount' => $amount,
            'description' => $description,
        ];

        // Send request to MTN Mobile Money API using cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://mobilemoneyapi.mtn.com/collection/v1_0/requesttopay');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-Reference-Id: ' . uniqid(),
            'Content-Type: application/json',
            'Ocp-Apim-Subscription-Key: ' . $this->api_key,
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Parse response and return payment status
        $data = json_decode($response, true);
        if (isset($data['transaction_reference'])) {
            return 'pending';
        } else {
            return 'failed';
        }
    }
}
