<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Customer extends \Core\Model

{

    private $db;

    public function __construct()
    {
        //    static::$db = new Database();
    }
    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT cus_id, fname, lname, email FROM customers');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username)
    {
        static::$db->query('SELECT * FROM customers WHERE cus_id = :username OR usersEmail = :email');
        static::$db->bind(':username', $username);
        static::$db->bind(':email', $email);

        $row = static::$db->single();

        //Check row
        if (static::$db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    //Register User
    public static function register($data)
    {
        $db = static::getDB();
        $db->query("INSERT INTO customers (fname, lname, email, password)VALUES ('" . $data['firstname'] . "', '" . $data['lastname'] . "', '" . $data['email'] . "', '" . $data['password'] . "')");
        //Bind values
        // $db->bind(':name', $data['usersName']);
        // $db->bind(':email', $data['usersEmail']);
        // $db->bind(':Uid', $data['usersUid']);
        // $db->bind(':password', $data['usersPwd']);
        // return true;
        //Execute
        // if (static::$db->execute()) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    //Login user
    public function login($nameOrEmail, $password)
    {
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if ($row == false) {
            return false;
        }

        $hashedPassword = $row->usersPwd;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Reset Password
    public static function resetPassword($newPwdHash, $tokenEmail)
    {
        static::$db->query('UPDATE users SET usersPwd=:pwd WHERE usersEmail=:email');
        static::$db->bind(':pwd', $newPwdHash);
        static::$db->bind(':email', $tokenEmail);

        //Execute
        if (static::$db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
