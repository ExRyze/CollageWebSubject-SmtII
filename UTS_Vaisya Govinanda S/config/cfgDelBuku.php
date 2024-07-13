<?php
include "./../core/db_conn.php";

$id = $_GET['id'];

$sql = "DELETE FROM `buku` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
  header("Location: ./../buku.php");
  exit();
} else {
  header("Location: ./../buku.php?error=Something wrong!");
  exit();
}