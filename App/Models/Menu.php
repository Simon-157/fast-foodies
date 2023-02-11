<?php

namespace App\Models;

class Menu extends \Core\Model

{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllMenus()
    {
        $stmt = $this->db->prepare("SELECT * FROM menus");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getMenuById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM menus WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function addMenu($restaurantId, $name, $description, $price)
    {
        $stmt = $this->db->prepare("INSERT INTO menus (restaurant_id, name, description, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$restaurantId, $name, $description, $price]);

        return $this->db->lastInsertId();
    }

    public function updateMenu($id, $restaurantId, $name, $description, $price)
    {
        $stmt = $this->db->prepare("UPDATE menus SET restaurant_id = ?, name = ?, description = ?, price = ? WHERE id = ?");
        $stmt->execute([$restaurantId, $name, $description, $price, $id]);

        return $stmt->rowCount();
    }

    public function deleteMenu($id)
    {
        $stmt = $this->db->prepare("DELETE FROM menus WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}
