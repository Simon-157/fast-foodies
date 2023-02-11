<?php

namespace App\Controllers;

class Auth extends \Core\Controller

{
    public function createAction(): bool
    {
        echo "Submitted successfully";

        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "first: " . $firstname . " last: " . $lastname;
        return true;

    }

    public function getUser(): bool
    {

        return true;

    }
}
