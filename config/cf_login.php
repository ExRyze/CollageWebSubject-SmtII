<?php
session_start();
include "db_conn.php";

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
    header("Location: ../index.php?error=Please complete the form!");
    exit();
  } else if (empty($uname)) {
    header("Location: ../index.php?error=Username is required");
    exit();
  } else if (empty($pass)) { 
    header("Location: ../index.php?error=Password is required");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);

      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['akses'] = $row['akses'];
      // header("Location: dashboard.php");
      exit();
    } else {
      header("Location: ../index.php?error=Inccorect Username or Password");
      exit();
    }
  }

} else {
  header("Location: index.php");
  exit();
}
?>