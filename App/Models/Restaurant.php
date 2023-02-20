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

    public static function addRestaurant($res_name, $res_email, $res_phone, $res_address, $image_url)
    {
        $conn = static::getDB();
        $query = "INSERT INTO restaurants (res_name, res_email, phone_number, res_address, uniquecode, img_url) VALUES (:res_name, :res_email, :res_phone, :res_address, :pass, :img_url)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':res_name', $res_name);
        $stmt->bindParam(':res_email', $res_email);
        $stmt->bindParam(':res_phone', $res_phone);
        $stmt->bindParam(':res_address', $res_address);
        $stmt->bindParam(':img_url', $image_url);
        $key = static::generateNumericOTP(5);
        $stmt->bindParam(':pass', $key);
    
        if ($stmt->execute()) {
            $id = $conn->lastInsertId();
            return $id;
        } else {
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

    public static function getRestaurantById($id, $unique)
    {
        $conn = static::getDB();
        switch ($unique){
            case 'no':

                    try {
                        $stmt = $conn->prepare("SELECT * FROM restaurants WHERE id = :id");
                        $stmt->bindParam(":id", $id);
                        $stmt->execute();
                        $restaurant = $stmt->fetch();
                        return $restaurant;

                    } catch (PDOException $e) {
                        echo 'Error: ' . $e->getMessage();
                        return null;
                    }
            case 'yes':
                try {
                    $stmt = $conn->prepare("SELECT uniquecode FROM restaurants WHERE id = :id");
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                    $code = $stmt->fetch();
                    return $code['uniquecode'];
        
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                    return null;
                }
            default:
                return false;
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
