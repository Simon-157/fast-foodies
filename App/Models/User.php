<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model

{

    private $conn;

    public function __construct()
    {
        $this->conn = static::getDB();
    }

    public static function getAll()
    {

        $stmt = static::$conn->query('SELECT cus_id, fname, lname, email FROM customers');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register($fname, $lname, $email, $password)
    {
        $query = "INSERT INTO users (fname, lname, email, password) VALUES (:fname,:lname, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
