<?php
include "./../core/db_conn.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$jumlah = $_POST['jumlah'];

$sql = "UPDATE `buku` SET `judul`='$judul',`penerbit`='$penerbit',`jumlah`=$jumlah WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
  header("Location: ./../buku.php");
  exit();
} else {
  header("Location: ./../updBuku.php?error=Something wrong!");
  exit();
}