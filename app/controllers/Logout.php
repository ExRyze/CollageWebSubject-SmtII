<?php

class Logout extends Controller {

    public function __construct() {
        Middleware::auth();
    }

    public function index() {
        session_unset();
        setcookie("token", '', time()-1);
        Flasher::setFlash("Session Anda telah berakhir!", "warning");
        return Functions::redirect("login");
    }
}