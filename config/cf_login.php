<?php
session_start();
include "./../core/db_conn.php";

if( isset($_POST['username'])) {
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $uname = validate($_POST['username']);
  $pass = validate($_POST['password']);

  if (empty($uname) && empty($pass)) {
    header("Location: ./../view/login.php?error=Please complete the form!");
    exit();
  } else if (empty($uname)) {
    header("Location: ./../view/login.php?error=Username is required");
    exit();
  } else if (empty($pass)) { 
    header("Location: ./../view/login.php?error=Password is required");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user'] = $row;
      var_dump($row);
      header("Location: ./../view/dashboard.php");
      exit();
    } else {
      header("Location: ./../view/login.php?error=User not found!");
      exit();
    }
  }

} else {
  header("Location: ./../view/login.php?error=Restricted!");
  exit();
}
?>