<?php

require_once "DBconnect.php";

class DBfunctions {

    // get data about all user from database
    public static function getUsersData(){
        $db = DBconnect::getInstance();

        $statement1 = $db->prepare("SELECT shelter.user.`email`, shelter.user.name, shelter.user.surname, shelter.user_log.*
                                              FROM shelter.user JOIN shelter.user_log ON shelter.user.`email`=shelter.user_log.`email`;");

        $statement1->execute();

        $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

        return $result1;
    }
    
    // store info about users last login
    public static function lastLogin($email){
        $db = DBconnect::getInstance();

        $dostop = date("Y-m-d H:i:s");

        $statement = $db->prepare("INSERT INTO shelter.user_log (`email`, access)
            VALUES (:email, :dostop)");
        $statement->bindParam(":email", $email);
        $statement->bindParam(":dostop", $dostop);
        $statement->execute();
    }

    // insert user to database
    public static function insert($name, $surname, $email, $password) {
        $db = DBconnect::getInstance();

        $statement1 = $db->prepare("SELECT `email` FROM shelter.user WHERE `email` = :eposta");
        $statement1->bindParam(":eposta", $email);
        $statement1->execute();
        $result1 = $statement1->fetch(PDO::FETCH_NUM);

        // if result > 1 means that user with that email already exists
        if($result1 < 1){

            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

            self::lastLogin($email);

            $statement = $db->prepare("INSERT INTO shelter.user (name, surname, `email`, password)
            VALUES (:name, :surname, :email, :password)");
            $statement->bindParam(":name", $name);
            $statement->bindParam(":surname", $surname);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":password", $hashed_pass);
            $statement->execute();
            return true;
        }
        else{
            return false;
        }
    }

     // checks if login credentials are valid
     public static function checkLoginData($eposta, $geslo){
        $db = DBconnect::getInstance();

        $statement = $db->prepare("SELECT COUNT(id) AS id FROM shelter.user WHERE `email` = :email");
        $statement->bindParam(":email", $eposta);
        $statement->execute();
        $anwser = $statement->fetch(PDO::FETCH_NUM);
        if($anwser[0] == 1){
            $checkPass = $db->prepare("SELECT password FROM shelter.user WHERE `email` = :email");
            $checkPass->bindParam(":email", $eposta);
            $checkPass->execute();
            $result = $checkPass->fetch(PDO::FETCH_NUM);
            $preveri = password_verify($geslo, $result[0]);
            if($preveri){
                $updateAccess = $db->prepare("UPDATE shelter.user_log SET `access` = :time WHERE `email` = :email");
                $updateAccess->bindParam(":time", date("Y-m-d H:i:s"));
                $updateAccess->bindParam(":email", $eposta);
                $updateAccess->execute();
                return true;
            }
            return false;
        }
        return false;
    }

    // returns name and surname of user with $email
    public static function getUser($email){
        $db = DBconnect::getInstance();

        $statement1 = $db->prepare("SELECT `name`, `surname` FROM shelter.user WHERE `email` = :eposta");
        $statement1->bindParam(":eposta", $email);
        $statement1->execute();
        $result1 = $statement1->fetch(PDO::FETCH_NUM);


        // var_dump($result1);
        // exit();
        return $result1;
    }

}