<?php

namespace App\Controllers;

use App\Models\Cart;
use Core\View;

class Checkout extends \Core\Controller

{
    public function __construct()
    {

    }

    public function viewAction(){
        View::render('Checkout/checkout.php');
    }


}
