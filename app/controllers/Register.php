<?php
class Register extends Controller {

    public function __construct() {
        Middleware::noAuth();
    }

    public function index() {
        // config
        if (!empty($_POST)) {
            if($this->model("Users")->validate()) {
                Flasher::setFlash("Username sudah digunakan!", "warning");
            } else {
                $this->model("Users")->regis();
                $_SESSION['user'] = $this->model("Users")->login();
                Flasher::setFlash("Selamat datang {$_SESSION['user']['username']}!", "success");
                return Functions::redirect("dashboard");
            }
        }

        // View
        return $this->view("auth/register");
    }

}