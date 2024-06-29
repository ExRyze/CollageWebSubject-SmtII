<?php

class Kategori extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function add() {
    if (!empty($_POST)) {
      if($this->model("Categories")->validate()) {
        Flasher::setFlash("Kategori sudah ada!", "warning");
      } else {
        $this->model("Categories")->insert();
        Flasher::setFlash("Data Kategori berhasil ditambahkan!", "success");
        return Functions::redirect("dashboard/kategori");
      }
    }
    Functions::redirect("dashboard/kategori");
  }

  public function update() {
    if (isset($_POST)) {
      if ($_POST['submit'] == "update") {
        $this->model("Categories")->update();
        Flasher::setFlash("Data kategori berhasil diupdate!", "warning");
        Functions::redirect("dashboard/kategori");
      } else if ($_POST['submit'] == "delete") {
        $this->model("Categories")->delete();
        Flasher::setFlash("Data kategori telah dihapus!", "danger");
        Functions::redirect("dashboard/kategori");
      }
    }
    Functions::redirect("dashboard/kategori");
  }
}