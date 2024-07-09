<?php

class Kategori extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index($index) {
      if (isset($_GET['search'])) {
        $data = $this->model("items")->search($_GET['search']);
      } else {
        $data = $this->model("items")->getItems($index);
      }
      return $this->view("dashboard/item", $data);
  }

  public function add() {
    if (!empty($_POST)) {
      if($this->model("Categories")->validate()) {
        Flasher::setFlash("Kategori sudah ada!", "warning");
      } else {
        $this->model("Categories")->insert();
        Flasher::setFlash("Data Kategori berhasil ditambahkan!", "success");
      }
    }
    Functions::redirect("dashboard/kategori");
  }

  public function update() {
    if (isset($_POST)) {
      if ($_POST['submit'] == "update") {
        if (!$this->model("Categories")->validate()) {
          $this->model("Categories")->update();
          Flasher::setFlash("Data kategori berhasil diupdate!", "success");
        } else {
          Flasher::setFlash("Data kategori sudah dipakai!", "warning");
        }
      } else if ($_POST['submit'] == "delete") {
        $this->model("Categories")->delete();
        Flasher::setFlash("Data kategori telah dihapus!", "danger");
      }
    }
    Functions::redirect("dashboard/kategori");
  }
}