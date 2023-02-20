<?php

namespace App\Models;

class Menu extends \Core\Model

{
    private $db;

    public function __construct()
    {
        $this->db = static::getDB();
    }

    public static function getAllMenus()
    {
        $conn = static::getDB();
        $stmt = $conn->prepare("SELECT * FROM menu");
        $stmt->execute();
        $result = $stmt->fetchAll();

        // Return the data in JSON format
        echo json_encode($result);
        return json_encode($result);
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
    

    public function updateMenu($id, $restaurantId, $name, $description, $price)
    {
        $stmt = $this->db->prepare("UPDATE menu SET restaurant_id = ?, name = ?, description = ?, price = ? WHERE id = ?");
        $stmt->execute([$restaurantId, $name, $description, $price, $id]);
        
        return $stmt->rowCount();
    }

    public function deleteMenu($id)
    {
        $stmt = $this->db->prepare("DELETE FROM menu WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}
