<?php

class Middleware {
    
    static function token() {
        if (isset($_COOKIE['token'])) {
            return Controller::model("Users")->logToken($_COOKIE['token']);
        } else {
            return [];
        }
    }

    static function auth() {
        if(isset($_SESSION['user']) === false) {
            Functions::redirect("login");
        }
    }

    static function noAuth() {
        if ($user = Middleware::token()) {
            $_SESSION['user'] = $user;
            Flasher::setFlash("Selamat datang kembali {$_SESSION['user']['username']}!", "success");
        }
        if(isset($_SESSION['user']) === true) {
            Functions::redirect();
        }
    }

    // static function role($role) {
    //     Middleware::auth();
    //     $roleId = Controller::model("Roles")->getId($role);
    //     if($_SESSION['users']['id'] != $roleId) {
    //         switch ($role) {
    //             case 'admin':
    //                 if($_SESSION['spp']['role'] != "admin") {
    //                     if($_SESSION['spp']['role'] === "petugas") {
    //                         return Functions::redirect("petugas");
    //                     } else {
    //                         return Functions::redirect("siswa");
    //                     }
    //                 }
    //                 break;
    //             case 'petugas':
    //                 if($_SESSION['spp']['role'] === "siswa") {
    //                     return Functions::redirect("siswa");
    //                 }
    //                 break;
    //             case 'siswa':
    //                 if($_SESSION['spp']['role'] != $role) {
    //                     return Functions::redirect("petugas");
    //                 }
    //                 break;
    //         }
    //     }
    // }
    
}