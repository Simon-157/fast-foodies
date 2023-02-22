<?php

namespace App\Controllers;
use \App\Models\Restaurant;
use Core\View;


class Restaurants extends \Core\Controller

{
    private $restaurant;

    public function _construct()
    {
        $this->restaurant = new Restaurant();

    }

    public function indexAction(){
        View::render('Restaurant/index.php');
    }

    public function viewAction()
    {
        View::render('Admin/index.php');
    }

    public function ordersAction()
    {
        View::render('Admin/orders.php');
    }
    public function newmenuAction()
    {
        View::render('Admin/new_menu.php');
    }

    public function publishedAction()
    {
        View::render('Admin/table.php');
    }

    public function createAction()
    {
        if (isset($_POST['res_name']) && isset($_POST['res_phone']) && isset($_POST['res_email']) && isset($_POST['res_address'])) {

            $restaurant_name = $_POST['res_name'];
            $restaurant_phone = $_POST['res_phone'];
            $restaurant_email = $_POST['res_email'];
            $restaurant_address = $_POST['res_address'];
            $restaurant_imageUrl = $_POST['image_url'];
            // echo "restaurant name: " . $restaurant_name . " res_emai;: " . $restaurant_email;
            $newResturant = Restaurant::addRestaurant($restaurant_name, $restaurant_email, $restaurant_phone, $restaurant_address, $restaurant_imageUrl);
            if ($newResturant) {
                $code = Restaurant::getRestaurantById($newResturant, 'yes');
                $mail = new Email();
                $mail->sendEmail($restaurant_email, strval($code));
                echo '<h3 style="color:green">Successfully registered your restaurant: ' . $code . '</h2>';

                return true;
                # code...
            } else {
                echo '<h3 style="color:red">Registration Unsuccessful</h2>';
                return false;
            }

        } else {
            echo "All fields are required";
        }

    }

    public function getAction()
    {
        if (array_key_exists('id', $_GET)) {

            $res_id = $_GET['id'];
            $restaurant = Restaurant::getRestaurantById($res_id, 'yes');
            if ($restaurant) {
                echo $restaurant['res_name'];
            } else {
                echo "Restaurant not found";
            }

        } else {
            echo "Error retrieving restaurant";
        }

    }

    public function getAllAction()
    {

        $restaurants = Restaurant::getAllRestaurants();
        if ($restaurants) {
            var_dump($restaurants);
        } else {
            echo "Error fetching all restaurants";
        }

    }

    public function updateAction()
    {
    }
}
