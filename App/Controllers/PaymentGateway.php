<?php 

namespace App\Controllers;

class PaymentGateWay extends \Core\Controller{

    private $api_key;
    private $api_secret;
    private $environment;
    private $base_url;
    private $headers;

    public function __construct($api_key, $api_secret, $environment) {
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
        $this->environment = $environment;
        $this->base_url = 'https://api.' . $this->environment . '.momoapi.com';
        $this->headers = array(
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode($this->api_key . ':' . $this->api_secret)
        );
    }

    public function make_payment() {

        $amount = $_POST['amount'];
        
        $phone_number =$_POST['phone_number'];
        
        $order = $_POST['order'];


        $url = $this->base_url . '/v1_0/transaction/payment';
        $callback_url = 'https://your-callback-url.com';
        $reference_id = uniqid();

        $body = array(
            'amount' => $amount,
            'currency' => 'EUR', // or any other supported currency
            'externalId' => $reference_id,
            'payer' => array(
                'partyIdType' => 'MSISDN',
                'partyId' => $phone_number
            ),
            'payerMessage' => 'Payment for ' . $order,
            'payeeNote' => 'Thank you for your purchase!',
            'callbackUrl' => $callback_url
        );

        $response = $this->send_request('POST', $url, $body);

        return $response;
    }

    private function send_request($method, $url, $body = null) {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);

        if ($body !== null) {
            $json_body = json_encode($body);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json_body);
        }

        $response = curl_exec($curl);

        if (!$response) {
            $error = curl_error($curl);
            throw new \Exception('Error making Momo Pay API request: ' . $error);
        }

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($http_code >= 400) {
            $error_message = $response ? json_decode($response, true)['message'] : 'Unknown error';
            throw new \Exception('Error making Momo Pay API request: ' . $error_message);
        }

        return json_decode($response, true);
    }
}



?>