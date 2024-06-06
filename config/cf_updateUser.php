<?php
session_start();
include "./../core/db_conn.php";
include "./../core/function.php";
// var_dump($_FILES);
if( isset($_POST['username'])) {
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = $_POST['id'];
  $username = validate($_POST['username']);

  if (empty($username)) {
    header("Location: ./../view/editUser.php?error=Username is required&id=$id");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $rslt = mysqli_query($conn, $sql);

    if (mysqli_num_rows($rslt) === 1) {
      $updatedAt = date("Y-m-d h:i:s");
      $img = image($id);
      
      $sql = "UPDATE `users` SET `username`='$username',`img`='$img',`updatedAt`='$updatedAt' WHERE `id`='$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        updateSelf($id, $rslt);
        header("Location: ./../view/dashboard.php?success=Data User updated!");
        exit();
      } else {
        header("Location: ./../view/editUser.php?error=Something wrong!&id=$id");
        exit();
      }
      exit();
    } else {
      header("Location: ./../view/editUser.php?error=User not found!&id=$id");
      exit();
    }
  }

} else {
  header("Location: ./../view/editUser.php?error=Restricted!&id=$id");
  exit();
}
?>