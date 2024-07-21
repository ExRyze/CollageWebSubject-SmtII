<?php

class Dashboard extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index($ctgId = "") {
    if ($ctgId) {
      var_dump($ctgId);
      if (isset($_GET['search'])) {
        $data = $this->model("items")->search($_GET['search']);
      } else {
        $data = $this->model("items")->getItems($ctgId);
      }
      $_POST['ctgId']=$ctgId;
      return $this->view("dashboard/indexItem", $data);
    }
    return $this->view("dashboard/index");
  }

  public function set() {
    if (isset($_POST['input'])) {
      $item = ['id' => $_POST['id'],
        'namaKategori' => $_POST['namaKategori'],
        'namaItem' => $_POST['namaItem'],
        'satuan' => $_POST['satuan'],
        'hargaSatuan' => $_POST['hargaSatuan']];
      Functions::inpSales($item, $_POST['qty']);
    }
    return Functions::redirect("dashboard");
  }

  public function unset($i = "") {
    if (isset($i)) {
      Functions::delSales($i);
    }
    return Functions::redirect("dashboard");
  }

  public function statistik() {
      return $this->view("dashboard/statistik");
  }

  // View Table
  public function admin() {
    if (isset($_GET['search'])) {
      $data = $this->model("Users")->searchAdmin($_GET['search']);
    } else {
      $data = $this->model("Users")->getAdmins();
    }
    return $this->view("dashboard/user", $data);
  }
  public function member() {
    if (isset($_GET['search'])) {
      $data = $this->model("Users")->searchMember($_GET['search']);
    } else {
      $data = $this->model("Users")->getMembers();
    }
    return $this->view("dashboard/user", $data);
  }

  public function kategori() {
    if (isset($_GET['search'])) {
      $data = $this->model("Categories")->search($_GET['search']);
    } else {
      $data = $this->model("Categories")->getAll();
    }
    return $this->view("dashboard/kategori", $data);
  }

  public function item() {
    if (isset($_GET['search'])) {
      $data = $this->model("Items")->search($_GET['search']);
    } else {
      $data = $this->model("Items")->getAll();
    }
    return $this->view("dashboard/item", $data);
  }
}