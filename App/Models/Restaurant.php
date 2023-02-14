<?php
namespace App\Models;

use PDO;
use PDOException;

class Restaurant extends \Core\Model

{

    public function __construct()
    {}
    public static function generateNumericOTP($n)
    {
        $generator = "1357902468";
        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        return $result;
    }

    public static function addRestaurant($res_name, $res_email, $res_phone, $res_address)
    {
        $conn = static::getDB();
        $query = "INSERT INTO restaurants (res_name, res_email, phone_number, address, uniquecode) VALUES (:res_name, :res_email, :res_phone, :res_address, :pass)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':res_name', $res_name);
        $stmt->bindParam(':res_email', $res_email);
        $stmt->bindParam(':res_phone', $res_phone);
        $stmt->bindParam(':res_address', $res_address);
        $key = static::generateNumericOTP(5);
        //   $password = password_hash($key, PASSWORD_DEFAULT);
        $stmt->bindParam(':pass', $key);
        echo "got here";
        if ($stmt->execute()) {
            echo "Successfully registered A Restaurant";
            return true;
        } else {
            echo "Failed to regist A restaurant";
            return false;
        }

    }

    public static function getAllRestaurants()
    {
        $conn = static::getDB();
        try {
            $stmt = $conn->prepare("SELECT * FROM restaurants");
            $stmt->execute();
            $restaurants = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $restaurants;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getRestaurantById($id)
    {
        $conn = static::getDB();
        try {
            $stmt = $conn->prepare("SELECT * FROM restaurants WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $restaurant = $stmt->fetch();

            return $restaurant;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateRestaurant($id, $res_name, $address, $phone_number, $res_email, $uniquecode)
    {
        $conn = static::getDB();
        try {
            $sql = "UPDATE restaurants SET res_name = :res_name, address = :address, phone_number = :phone_number, res_email = :res_email, uniquecode = :uniquecode WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":res_name", $res_name);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":phone_number", $phone_number);
            $stmt->bindParam(":res_email", $res_email);
            $stmt->bindParam(":uniquecode", $uniquecode);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
