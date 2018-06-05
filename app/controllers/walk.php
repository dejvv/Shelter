<?php

$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

class Walk extends Controller
{
    public function index($name = ''){
        $user = $this->model('User');
        $user->name = $name;
        
        $this->view('walk/index', ['name' => $user->name]);
    }

}