<?php

class Profile extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index($id = null) {
    if ($id) {
      if ($this->model("Users")->profile($id)) {
        $data = $this->model("Users")->profile($id);
        if ($data['username'] === $_SESSION['user']['username']) {
          if (!$data['email'] && !isset($_SESSION['flasher'])) {
            Flasher::setFlash("Mohon untuk melengkapi data!", "warning");
          }
          $data['edit'] = "enabled";
        }
        return $this->view("profile/index", $data);
      }
      Functions::redirect("dashboard"); //return page 404
    }
    Functions::redirect("dashboard");
  }

  public function updateImage($id = null) {
    if ($id) {
      if (isset($_FILES)) {
        $tipe=$_FILES['imageUpload']['type'];
        $size=$_FILES['imageUpload']['size'];
        $error=$_FILES['imageUpload']['error'];
        $path=$_FILES['imageUpload']['tmp_name'];
        if ($error === 4) {
            Flasher::setFlash("Please upload an image!", "warning");
            Functions::redirect("profile/".$id);
        } else {
          $formatValid=['jpg','jpeg','png','webp','gif'];
          $format=explode('/',$tipe);
          $format=strtolower(end($format));
          if (!in_array($format,$formatValid)) {
            Flasher::setFlash("Format gambar salah!", "warning");
            Functions::redirect("profile/".$id);
          }
          if ($size > 5000000) {
            Flasher::setFlash("Ukuran file melebihi batas!", "warning");
            Functions::redirect("profile/".$id);
          }
          $nama=uniqid().'.'.$format;
          move_uploaded_file($path, OSSIMG."/users/".$nama);
          if ($_SESSION['user']['image']) {
            unlink(OSSIMG."/users/".$_SESSION['user']['image']);
          }
          $this->model("Users")->updateImage($nama);
          $_SESSION['user']['image'] = $nama;
          Flasher::setFlash("Foto berhasil diperbaharui", "success");
          Functions::redirect("profile/".$id);
        }
      }
    }
    Functions::redirect("dashboard");
  }

  public function updateData($id = null) {
    if ($id) {
      if (isset($_POST)) {
        $this->model("Users")->update();
        Flasher::setFlash("Data berhasil diperbaharui", "success");
        Functions::redirect("profile/".$id);
      }
    }
    Functions::redirect("dashboard");
  }
}