<?php
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
    header("Location: ./../view/register.php?error=Please complete the form!");
    exit();
  } else if (empty($uname)) {
    header("Location: ./../view/register.php?error=Username is required");
    exit();
  } else if (empty($pass)) { 
    header("Location: ./../view/register.php?error=Password is required");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $createdAt = date("Y-m-d h:i:s");
      $updatedAt = $createdAt;
      
      $sql = "INSERT INTO `users`(`username`, `password`, `createdAt`, `updatedAt`) VALUES ('$username','$password','$createdAt','$updatedAt')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header("Location: ./../view/login.php?error=Now login!");
        exit();
      } else {
        header("Location: ./../view/register.php?error=Something wrong!");
        exit();
      }
    } else {
      header("Location: ./../view/register.php?error=Data already exist!");
      exit();
    }
  }

} else {
  header("Location: ./../view/register.php?error=Restricted!");
  exit();
}
?>