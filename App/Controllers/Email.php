<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Config;
use Google\Service\Batch\Message;
use Google\Service\CloudSearch\ErrorMessage;
use SendGrid\Mail\Mail;
class Email extends \Core\Controller{

    public function __construct(){}

    public static function sendEmail($recipient, $body) {
        $email = new Mail();
        $email->setFrom("junioratta2929@gmail.com", "fast foodies");
        $email->setSubject("Subject of the email");
        $email->addTo($recipient);
        $email->addContent("text/plain", $body);

        $sendgrid = new \SendGrid(Config::SENDGRID_API_KEY); 
        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() === 202) {
                echo "Email  sent";
                return true; // email sent successfully
            } else {
                echo "Email Not sent";
                return $response; // email sending failed
            }
        } catch (\Exception $e) {
            
            return $e; // email sending failed
        }
    }

}
