<?php

class Dashboard extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
      return $this->view("dashboard/index");
  }

  // View Table
  public function user() {
    if (isset($_GET['search'])) {
      $data = $this->model("Users")->search($_GET['search']);
    } else {
      $data = $this->model("Users")->getAll();
    }
    return $this->view("dashboard/user", $data);
  }
}