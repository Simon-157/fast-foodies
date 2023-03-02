<?php

namespace App\ControllerS;

use App\Models\Analytics;
use Core\View;

class Analytic extends \Core\Controller

{
    public function _construct()
    {

    }

    public function viewAction(){
        View::render('Admin/analytics.php');
    }

    public function analyticsAction()
    {
        session_start();
        if (isset($_SESSION['restaurant_id'])) {
            $restaurant_id = $_SESSION['restaurant_id'];

            $results = Analytics::getRevenueByMonths($restaurant_id);
            echo json_encode($results);

        } else {
            echo "<h2>No restaurant id was provided</h2>";
        }

    }
}
