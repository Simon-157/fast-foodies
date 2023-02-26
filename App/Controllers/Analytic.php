<?php

namespace App\ControllerS;

use App\Models\Analytics;

class Analytic extends \Core\Controller

{
    public function _construct()
    {

    }

    public function analyticsAction()
    {
        if (array_key_exists('id', $_GET)) {
            $restaurant_id = $_GET['id'];

            $results = Analytics::getRevenueByMonths($restaurant_id);
            var_dump($results);

        } else {
            echo "<h2>No restaurant id was provided</h2>";
        }

    }
}
