<?php

class User extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function add() {
    if (!empty($_POST)) {
      if($this->model("Users")->validate()) {
        Flasher::setFlash("Username sudah digunakan!", "warning");
      } else {
        $this->model("Users")->insert();
        Flasher::setFlash("Data User telah ditambahkan!", "success");
        return Functions::redirect("dashboard/user");
      }
    }
    Functions::redirect("dashboard/user");
  }

  public function remove($id = null) {
    if ($id) {
      if ($id == $_SESSION['user']['id']) {
        Flasher::setFlash("Tidak bisa menghapus data sendiri!", "warning");
        Functions::redirect("dashboard/user");
      } else {
        $this->model("Users")->delete($id);
        Flasher::setFlash("Berhasil menghapus data user", "success");
        Functions::redirect("dashboard/user");
      }
    }
    Functions::redirect("dashboard/user");
  }
}