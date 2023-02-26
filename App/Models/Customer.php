<?php

namespace App\Models;

use PDO;

class Customer extends \Core\Model

{

    private $db;

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
