<?php

class User extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function add($role) {
    if (!empty($_POST)) {
      if($this->model("Users")->validate()) {
        Flasher::setFlash("Username sudah digunakan!", "warning");
      } else {
        if ($role === "admin") {
          $this->model("Users")->insert();
          Flasher::setFlash("Data Admin telah ditambahkan!", "success");
        } else {
          $this->model("Users")->regis();
          Flasher::setFlash("Data member telah ditambahkan!", "success");
        }
      }
    }
    Functions::redirect("dashboard/".$role);
  }

  public function remove($id = null) {
    if ($id) {
      if ($id == $_SESSION['user']['id']) {
        Flasher::setFlash("Tidak bisa menghapus data sendiri!", "warning");
      } else {
        $this->model("Users")->delete($id);
        Flasher::setFlash("Berhasil menghapus data user", "danger");
      }
    }
    Functions::back();
  }
}