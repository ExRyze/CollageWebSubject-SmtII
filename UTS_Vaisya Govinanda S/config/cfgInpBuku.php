<?php
include "./../core/db_conn.php";

$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO `buku`(`judul`, `penerbit`, `jumlah`) VALUES ('$judul', '$penerbit', $jumlah)";
$result = mysqli_query($conn, $sql);
if ($result) {
  header("Location: ./../buku.php");
  exit();
} else {
  header("Location: ./../inpBuku.php?error=Something wrong!");
  exit();
}