<?php 
session_start();
include "./../core/middleware.php";
include "./../query/userSingle.php";
auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
</head>
<body>
  <?php
    if (isset($_GET['error'])) {
      echo "<b>{$_GET['error']}</b><hr>";
    }
  ?>

  <h3>Edit User</h3>

  <form action="./../config/cf_updateUser.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

    <?php
    if ($data['img']) {
      echo "<img width='100' height='100' src='./../".$data['img']."' alt='".$data['username']."'>";
    }?>
    <br>

    <label for="username">Username</label><br>
    <input type="text" name="username" value="<?= $data['username'] ?>">
    <br><br>

    <label for="image">Image</label><br>
    <input type="file" name="image">
    <br><br>

    <button type="submit">Submit</button>
  </form>
  <a href="./dashboard.php">Dashboard</a>
</body>
</html>