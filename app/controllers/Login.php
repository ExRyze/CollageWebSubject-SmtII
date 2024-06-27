<?php
class Login extends Controller {

    public function __construct() {
        Middleware::noAuth();
    }

    public function index() {
        // data
        $data['page'] = "Login";

        // config
        if (!empty($_POST)) {
            if($this->model("Users")->validate()) {
                if ($user = $this->model("Users")->login()) {
                    $_SESSION['user'] = $user;
                    if (isset($_POST['remember'])) {
                        $token = md5(uniqid().rand(1000000, 9999999));
                        $this->model("Users")->token($_SESSION['user']['id'], $token);
                        setcookie("token", $token, time() + (86400 * 30));
                    }
                    Flasher::setFlash("Selamat datang kembali {$_SESSION['user']['username']}!", "success");
                    return Functions::redirect("dashboard");
                }
                Flasher::setFlash("Data tidak cocok!", "warning");
            } else {
                Flasher::setFlash("User tidak ditemukan!", "warning");
            }
        }

        // View
        return $this->view("auth/login", $data);
    }

}