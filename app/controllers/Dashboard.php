<?php

class Dashboard extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
      return $this->view("dashboard/index");
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