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
      Functions::redirect("kategori/".$_POST['ctgId']);
    }
    Functions::redirect("dashboard/item");
  }

  public function update() {
    if (isset($_POST)) {
      if ($this->model("Items")->validate()) {
        $this->model("Items")->update();
        Flasher::setFlash("Data item produk berhasil diupdate!", "success");
      }
      Functions::redirect("kategori/".$_POST['ctgId']);
    }
    Functions::redirect("dashboard/item");
  }

  public function remove($id = null) {
    if (isset($id)) {
      $this->model("Items")->delete($id);
      Flasher::setFlash("Data item produk telah dihapus!", "danger");
    }
    Functions::back();
  }
}