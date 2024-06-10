<?php
session_start();
include "./../core/db_conn.php";
if( isset($_GET['id'])) {
  include "./../query/userSingle.php";
  unlink("./../".$data['img']);
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE `id`='$id'";
  $rslt = mysqli_query($conn, $sql);

  if (mysqli_num_rows($rslt) === 1) {
    $sql = "DELETE FROM `users` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if ($_SESSION['user']['id'] === $id) {
        header("Location: ./cf_logout.php");
        exit();
      }
      header("Location: ./../view/dashboard.php?success=Data User deleted!");
      exit();
    } else {
      header("Location: ./../view/dashboard.php?error=Something wrong!&id=$id");
      exit();
    }
    exit();
  } else {
    header("Location: ./../view/dashboard.php?error=User not found!&id=$id");
    exit();
  }

} else {
  header("Location: ./../view/editUser.php?error=Restricted!&id=$id");
  exit();
}
?>