<?php

namespace App\Models;

use App\configs\Database;
use PDO;


/**
 * Example user model
 *
 * PHP version 7.0
 */
class Customer extends \Core\Model
{

   private $db;

   public function __construct(){
       static::$db = new Database();
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
    public function findUserByEmailOrUsername($email, $username){
        static::$db->query('SELECT * FROM users WHERE usersUid = :username OR usersEmail = :email');
        static::$db->bind(':username', $username);
        static::$db->bind(':email', $email);

        $row = static::$db->single();

        //Check row
        if(static::$db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //Register User
    public static function register($data){
        static::$db->query('INSERT INTO users (usersName, usersEmail, usersUid, usersPwd)
        VALUES (:name, :email, :Uid, :password)');
        //Bind values
        static::$db->bind(':name', $data['usersName']);
        static::$db->bind(':email', $data['usersEmail']);
        static::$db->bind(':Uid', $data['usersUid']);
        static::$db->bind(':password', $data['usersPwd']);

        //Execute
        if(static::$db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->usersPwd;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

    //Reset Password
    public static function resetPassword($newPwdHash, $tokenEmail){
        static::$db->query('UPDATE users SET usersPwd=:pwd WHERE usersEmail=:email');
        static::$db->bind(':pwd', $newPwdHash);
        static::$db->bind(':email', $tokenEmail);

        //Execute
        if(static::$db->execute()){
            return true;
        }else{
            return false;
        }
    }


}
