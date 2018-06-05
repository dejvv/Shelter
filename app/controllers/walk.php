<?php

$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

// echo "<pre>";
// var_dump(getcwd());
// exit;

require_once("../app/models/Dog.php");
require_once("../app/core/ViewHelper.php");

class Walk extends Controller
{
    // public function index($name = ''){
    //     $user = $this->model('User');
    //     $user->name = $name;
        
    //     $this->view('walk/index', ['name' => $user->name]);
    // }

    public static function index() {
        if (isset($_GET["id"])) {
        	// echo "<pre>";
        	// var_dump($_GET["id"]);
        	// exit;
            ViewHelper::render("../app/view/walk/dog.php", ["dog" => Dog::get($_GET["id"])]);
        } else if (isset($_GET["letswalk"])) {
        	// echo "<pre>";
        	// var_dump($_GET["letswalk"]);
        	// exit;
            ViewHelper::render("../app/view/walk/walk-dog.php", ["dog" => Dog::getSchedule($_GET["letswalk"])]);
        } else if (isset($_GET["errors"])) {
            ViewHelper::render("../app/view/walk/walk-dog.php", ["dog" => Dog::getSchedule($_GET["errors"])]);
        } else {
            ViewHelper::render("../app/view/walk/index.php", ["dogs" => Dog::getAll()]);
        }
    }

    public static function setWalk() {
    	$dataSet = isset($_POST["from-time"]) && !empty($_POST["from-time"]) &&
            isset($_POST["date"]) && !empty($_POST["date"]) &&
            isset($_POST["to-time"]) && !empty($_POST["to-time"]);

        if(!$dataSet){
        	ViewHelper::redirect('../walk?errors=' . $_POST["dogg"]);
        } 

        // check if date is set before today
        $today_start = strtotime('today');
		$date_timestamp = strtotime($_POST["date"]);

		if ($date_timestamp < $today_start) {
		    ViewHelper::redirect('../walk?errors=' . $_POST["dogg"]);
		}


        // else{
        // 	echo "<pre>";
        // 	var_dump($dataSet);
        // 	exit;
        // }
        $date = new DateTime($_POST["date"]);

		$time = new DateTime($_POST["from-time"]);
        $fromDate = new DateTime($date->format('Y-m-d') .' ' .$time->format('H:i:s'));

        $time = new DateTime($_POST["to-time"]);
        $toDate = new DateTime($date->format('Y-m-d') .' ' .$time->format('H:i:s'));

        // echo "<pre>";
        // var_dump($fromDate);
        // var_dump($toDate);
        // exit;

        $result = Dog::insertSchedule($_POST["dogg"], $fromDate->format('Y-m-d H:i:s'), $toDate->format('Y-m-d H:i:s'), $_SESSION["user"]);
        if($result){
            ViewHelper::redirect('../schedule?setWalk=success');
        }
        else{
            ViewHelper::redirect('../walk?errors=' . $_POST["dogg"]);
        }
    }

}