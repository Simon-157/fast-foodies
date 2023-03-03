<?php

namespace App\Models;
use PDOException;

class Order extends \Core\Model
{
    private $db;

    public function __construct()
    {
        $this->db = static::getDB();
    }

    public static function getOrders()
    {

        session_start();
        $conn = static::getDB();
        if(isset($_SESSION['restaurant_id'])){

            try {
                $restaurantId = $_SESSION['restaurant_id'];
                $stmt = $conn->prepare(
                    "SELECT o.*, m.food_name, m.price, m.food_imgUrl, u.user_address
                    FROM placed_orders o
                    INNER JOIN menu m ON o.menu_id = m.id
                    INNER JOIN users u ON o.user_id = u.id
                    WHERE o.restaurant_id = ?                    
                    ");
                $stmt->bindParam(1, $restaurantId);
                $stmt->execute();
                $result = $stmt->fetchAll();
                // Return the data in JSON format
                header('Content-Type: application/json');
                echo json_encode($result);
                return json_encode($result);

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
        }
        else{
            header("location: /fast-foodies/login");
            exit();
        }


    }

    public function getMenuById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM menu WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function addMenu($restaurantId, $food_name, $food_description, $price, $quantity, $food_imgUrl)
    {
        $conn = static::getDB();
        $stmt = $conn->prepare("INSERT INTO menu (restaurant_id, food_name, food_description, price, quantity, food_imgUrl) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $restaurantId);
        $stmt->bindParam(2, $food_name);
        $stmt->bindParam(3, $food_description);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $quantity);
        $stmt->bindParam(6, $food_imgUrl);
        if ($stmt->execute()) {
            $id = $conn->lastInsertId();
            return $id;
        } else {
            return false;
        }
    }


    public function updateMenu($menuId, $food_name, $food_description, $price, $quantity)
    {
        $conn = static::getDB();
        $restaurantId = $_SESSION['restaurant_id'];
        $stmt = $conn->prepare("UPDATE menu SET food_name=?, food_description=?, price=?, quantity=?  WHERE id=? AND restaurant_id=?");
        $stmt->bindParam(1, $food_name);
        $stmt->bindParam(2, $food_description);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $quantity);
        $stmt->bindParam(5, $menuId);
        $stmt->bindParam(6, $restaurantId);
        if ($stmt->execute()) {
            return $menuId;
        } else {
            return false;
        }
    }

    public function deleteOrder($orderId)
    {
        $conn = static::getDB();
        $restaurantId = $_SESSION['restaurant_id'];
        $stmt = $conn->prepare("DELETE FROM menu WHERE id=? AND restaurant_id=?");
        $stmt->bindParam(1, $orderId);
        $stmt->bindParam(2, $restaurantId);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}