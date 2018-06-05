<?php

require_once "../app/database/DBconnect.php";

class Dog {
	public static function getAll() {
        $db = DBconnect::getInstance();

        $statement = $db->prepare("SELECT id, name, sex, age, description, picture 
            FROM shelter.dog");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBconnect::getInstance();
        $statement = $db->prepare("SELECT id, name, sex, age, description, picture 
            FROM shelter.dog WHERE id= :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $dog = $statement->fetch();

        // echo "<pre>";
        // var_dump($dog);
        // foreach ($dog as $key => $value) {
        //     echo "Key: $key Value: $value\n";
        // }
        // exit;

        if ($dog != null) {
            return $dog;
        } else {
            throw new InvalidArgumentException("No record with id $id");
        }
    }

    public static function getSchedule($id) {
        $db = DBconnect::getInstance();
            // echo "<pre>";
            // var_dump($id);
            // exit;
         $statement = $db->prepare("SELECT *
            FROM shelter.schedule WHERE dog_id= :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $dog = $statement->fetchAll();

        if ($dog != null) {
            // echo "<pre>";
            // var_dump($dog);
            // exit;
            return $dog;
        } else {
            // indicate user there is no schedule for this dog yet
            $a = array('dog_id' => $id, 'schedule' => 'none');
            return $a;
        }
    }

    // insert schedule in to database
    public static function insertSchedule($id_dog, $from_date, $to_date, $email) {
        $db = DBconnect::getInstance();

        // first get id of user
        $statement1 = $db->prepare("SELECT `id` FROM shelter.user WHERE `email` = :eposta");
        $statement1->bindParam(":eposta", $email);
        $statement1->execute();
        $result1 = $statement1->fetch(PDO::FETCH_NUM);

        // var_dump($result1);
        // exit;

        // if we got id and everything is cool
        if(isset($result1)){
            $userid = $result1;
            // var_dump($result1, $id_dog);
            // exit;

            $statement = $db->prepare("INSERT INTO shelter.schedule (`user_id`, `dog_id`, `from_when`, `to_when`)
            VALUES (:uid, :did, :fw, :tw);");
            $statement->bindParam(":uid", intval($userid));
            $statement->bindParam(":did", $id_dog);
            $statement->bindParam(":fw", $from_date);
            $statement->bindParam(":tw", $to_date);
            $statement->execute();
            return true;
        }
        else{
            return false;
        }
    }
}