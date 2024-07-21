<?php

class Checkout extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
    if ($_SESSION['sales'] && $_POST) {
      if ($_POST['total'] > $_POST['bayar']) {
        Flasher::setFlash("Uang pembayaran kurang.", "warning");
      } else {
        Flasher::setFlash("Pembayaran berhasil. Total kembalian adalah Rp.".($_POST['bayar']-$_POST['total']), "success");
        $this->model('Sales')->insert();
        $id = $this->model('Sales')->getLastId();
        foreach ($_SESSION['sales'] as $sale) {
          $this->model('Sales')->insertDetail($id['id'], $sale);
        }
        Functions::unsSales();
      }
      return Functions::redirect("dashboard");
    }
  }
}