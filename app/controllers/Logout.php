<?php

class Logout extends Controller{
    public function index(){
        session_start();
        if(isset($_SESSION)){
            session_unset();
            session_destroy();
            header("location: ../../public/admin/login");
        }
    }
}