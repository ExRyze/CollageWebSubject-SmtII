<?php

class User extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function remove($id = null) {
    if ($id) {
      $this->model("Users")->delete($id);
      Flasher::setFlash("Berhasil menghapus data user", "success");
      Functions::redirect("dashboard/user");
    }
    Functions::redirect("dashboard/user");
  }
}