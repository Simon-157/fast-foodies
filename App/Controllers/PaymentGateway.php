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



// <?php
// require_once('vendor/autoload.php');

// class PaymentGateway {
//   private $stripe_secret_key;
//   private $db_servername;
//   private $db_username;
//   private $db_password;
//   private $db_name;

//   public function __construct($stripe_secret_key, $db_servername, $db_username, $db_password, $db_name) {
//     $this->stripe_secret_key = $stripe_secret_key;
//     $this->db_servername = $db_servername;
//     $this->db_username = $db_username;
//     $this->db_password = $db_password;
//     $this->db_name = $db_name;
//     \Stripe\Stripe::setApiKey($this->stripe_secret_key);
//   }

//   public function processPayment($token, $amount) {
//     try {
//       // Create the charge with Stripe
//       $charge = \Stripe\Charge::create([
//         'amount' => $amount,
//         'currency' => 'usd',
//         'description' => 'Example charge',
//         'source' => $token,
//       ]);

//       // Insert the payment details into the database
//       $conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);

//       if ($conn->connect_error) {
//         die('Connection failed: ' . $conn->connect_error);
//       }

//       $sql = "INSERT INTO orders (amount, payment_method) VALUES ('$amount', 'stripe')";
//       if ($conn->query($sql) === TRUE) {
//         return 'Payment successful';
//       } else {
//         return 'Error: ' . $sql . '<br>' . $conn->error;
//       }

//       $conn->close();
//     } catch (Exception $e) {
//       return 'Error: ' . $e->getMessage();
//     }
//   }
// }





