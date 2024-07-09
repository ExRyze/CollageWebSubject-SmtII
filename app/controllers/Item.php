<?php

class Item extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function add() {
    if (!empty($_POST)) {
      if($this->model("Items")->validate()) {
        Flasher::setFlash("Item dengan satuan tersebut sudah ada!", "warning");
      } else {
        $this->model("Items")->insert();
        Flasher::setFlash("Data item produk berhasil ditambahkan!", "success");
      }
    }
    Functions::redirect("dashboard/item");
  }

  public function update() {
    if (isset($_POST)) {
      if ($_POST['submit'] == "update") {
        if (!$this->model("Items")->validate()) {
          $this->model("Items")->update();
          Flasher::setFlash("Data item produk berhasil diupdate!", "success");
        } else {
          Flasher::setFlash("Item dengan satuan tersebut sudah ada!", "warning");
        }
      } else if ($_POST['submit'] == "delete") {
        $this->model("Items")->delete();
        Flasher::setFlash("Data item telah dihapus!", "danger");
      }
    }
    Functions::back();
  }
}