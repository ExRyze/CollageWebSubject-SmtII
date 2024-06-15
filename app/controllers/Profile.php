<?php

class Profile extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index($username = null) {
    if ($username) {
      if ($this->model("Users")->validate($username)) {
        $data = $this->model("Users")->profile($username);
        if ($data['username'] === $_SESSION['user']['username'] && !isset($_SESSION['flasher'])) {
          if (!$data['email']) {
            Flasher::setFlash("Mohon untuk melengkapi data!", "warning");
          }
          $data['edit'] = "enabled";
        }
        return $this->view("profile/index", $data);
      }
      Functions::redirect("dashboard"); //return page 404
    }
    Functions::redirect("dashboard");
  }

  public function updateImage() {
    if (isset($_FILES)) {
      var_dump($_FILES);
    }
    var_dump("test");
    // return Functions::redirect("profile");
  }
}