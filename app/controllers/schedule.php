<?php

$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

require_once("../app/models/User.php");
require_once("../app/core/ViewHelper.php");

class Schedule extends Controller
{
    public static function index () {
        if (isset($_POST["id_schedule"])) {
            // ViewHelper::render("../app/view/schedule/index.php", ["my_schedules" => User::deleteSchedule($_POST["id_schedule"], $_SESSION["user"])]);
            ["my_schedules" => User::deleteSchedule($_POST["id_schedule"], $_SESSION["user"])];
        } else { 
            ViewHelper::render("../app/view/schedule/index.php", ["my_schedules" => User::getSchedules($_SESSION["user"])]);
        }
    }


}