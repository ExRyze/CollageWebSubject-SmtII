<?php

class Penjualan extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
      if (isset($_GET['search'])) {
        $data = $this->model("Sales")->search($_GET['search']);
      } else {
        $data = $this->model("Sales")->getAll();
      }
      return $this->view("dashboard/penjualan", $data);
  }
  
  public function insert() {
    if ($_SESSION['sales'] && $_POST) {
      if (!$this->model('Users')->getMemberById($_POST['memberId'])) {
        Flasher::setFlash("Member ID tidak ditemukan.", "warning");
      } else if ($_POST['total'] > $_POST['bayar']) {
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

  public function remove($id = null) {
    if (isset($id)) {
      $this->model("Sales")->delete($id);
      Flasher::setFlash("Data penjualan telah dihapus!", "danger");
    }
    Functions::back();
  }
}