<?php

$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

require_once '../app/database/DBfunctions.php';
require_once("../app/core/ViewHelper.php");

class Register extends Controller
{
    public function index($name = ''){
        $user = $this->model('User');
        $user->name = $name;

        $this->view('register/index', ['name' => $user->name]);
    }

    public function add(){

        $dataSet = isset($_POST["name"]) && !empty($_POST["name"]) &&
            isset($_POST["surname"]) && !empty($_POST["surname"]) &&
            isset($_POST["email"]) && !empty($_POST["email"]) &&
            isset($_POST["password"]) && !empty($_POST["password"]);

        $_POST["name"] = htmlspecialchars($_POST["name"]);
        $_POST["surname"] = htmlspecialchars($_POST["surname"]);
        $_POST["email"] = htmlspecialchars($_POST["email"]);
        $_POST["password"] = htmlspecialchars($_POST["password"]);

        if ($dataSet) {
            $res = DBfunctions::insert($_POST["name"], $_POST["surname"], $_POST["email"], $_POST["password"]);
            if($res){
                ViewHelper::redirect('../../logIn?registration=successfull');
            }
            else{
                ViewHelper::redirect('../../register');
            }
        } else {
            // echo "<pre>";
            // var_dump("no valid data");
            // exit;
            ViewHelper::redirect('../../register');
        }
        $_POST["name"] = "";
        $_POST["surname"] = "";
        $_POST["email"] = "";
        $_POST["password"] = "";
    }

}