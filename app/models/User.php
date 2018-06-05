<?php

require_once "../app/database/DBconnect.php";

class User
{

    public static function getSchedules($email) {
        $db = DBconnect::getInstance();

         // first get id of user
        $statement1 = $db->prepare("SELECT `id` FROM shelter.user WHERE `email` = :eposta");
        $statement1->bindParam(":eposta", $email);
        $statement1->execute();
        $id = $statement1->fetchAll();

        // var_dump(intval($id[0]["id"]));
        // exit;

        $id = intval($id[0]["id"]);


        // $sql = "SELECT schedule.id, schedule.user_id, schedule.dog_id, schedule.from_when, schedule.to_when, dog.name FROM `schedule` JOIN `dog` ON schedule.dog_id=dog.id WHERE `schedule.user_id`= :id;";
        $statement = $db->prepare("SELECT * 
            FROM shelter.schedule WHERE `user_id`= :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $res = $statement->fetchAll();

        if ($res != null) {
            // echo "<pre>";
            // var_dump($dog);
            // exit;
            return $res;
        } else {
            // indicate user there is no schedule for this dog yet
            $a = array('schedule' => 'none');
            return $a;
        }
    }

    // insert schedule in to database
    public static function deleteSchedule($id, $email) {
        $db = DBconnect::getInstance();

        // first get id of user
        $statement1 = $db->prepare("DELETE FROM shelter.schedule WHERE `id` = :id");
        $statement1->bindParam(":id", $id);
        $statement1->execute();

        return true;
        // return self::getSchedules($email);
    }

}