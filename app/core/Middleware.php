<?php

class Middleware {
    
    static function token() {
        if (isset($_COOKIE['token'])) {
            return Controller::model("Users")->logToken($_COOKIE['token']);
        } else {
            return [];
        }
    }

    static function auth(bool $role = true) {
        if(isset($_SESSION['user']) === false) {
            Functions::redirect("login");
        } else {
            Middleware::role($role);
        }
    }

    static function noAuth() {
        if (isset($_SESSION['user']) === false) {
            if ($user = Middleware::token()) {
                $_SESSION['user'] = $user;
                Flasher::setFlash("Selamat datang kembali {$_SESSION['user']['username']}!", "success");
                Functions::redirect();
            }
        } else {
            Functions::redirect();
        }
    }

    static function role(bool $role) {
        if($_SESSION['user']['role'] != "Admin" && $role == true) {
            Functions::redirect();
        }
    }
    
}