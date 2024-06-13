<?php

class Dashboard extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
      return $this->view("dashboard/index");
  }
}