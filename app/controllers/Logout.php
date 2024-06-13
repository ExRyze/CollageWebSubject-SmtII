<?php

class Logout extends Controller {

    public function __construct() {
        Middleware::auth();
    }

    public function index() {
        session_unset();
        Flasher::setFlash("Session Anda telah berakhir!", "warning");
        return Functions::redirect("login");
    }
}