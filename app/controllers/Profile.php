<?php

class Profile extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index($username = null) {
    if ($username) {
      if ($this->model("Users")->validate($username)) {
        $data = $this->model("Users")->profile($username);
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

  public function updateImage($username = null) {
    if ($username) {
      if (isset($_FILES)) {
        $tipe=$_FILES['imageUpload']['type'];
        $size=$_FILES['imageUpload']['size'];
        $error=$_FILES['imageUpload']['error'];
        $path=$_FILES['imageUpload']['tmp_name'];
        if ($error === 4) {
            Flasher::setFlash("Please upload an image!", "warning");
            Functions::redirect("profile/".$username);
        } else {
          $formatValid=['jpg','jpeg','png','webp','gif'];
          $format=explode('/',$tipe);
          $format=strtolower(end($format));
          if (!in_array($format,$formatValid)) {
            Flasher::setFlash("Format gambar salah!", "warning");
            Functions::redirect("profile/".$username);
          }
          if ($size > 5000000) {
            Flasher::setFlash("Ukuran file melebihi batas!", "warning");
            Functions::redirect("profile/".$username);
          }
          $nama=uniqid().'.'.$format;
          move_uploaded_file($path, OSSIMG."/users/".$nama);
          if ($_SESSION['user']['image']) {
            unlink(OSSIMG."/users/".$_SESSION['user']['image']);
          }
          $this->model("Users")->updateImage($nama);
          $_SESSION['user']['image'] = $nama;
          Flasher::setFlash("Foto berhasil diperbaharui", "success");
          Functions::redirect("profile/".$username);
        }
      }
    }
    Functions::redirect("dashboard");
  }

  public function updateData($username = null) {
    if ($username) {
      if (isset($_POST)) {
        $this->model("Users")->update();
        Flasher::setFlash("Data berhasil diperbaharui", "success");
        Functions::redirect("profile/".$username);
      }
    }
    Functions::redirect("dashboard");
  }
}