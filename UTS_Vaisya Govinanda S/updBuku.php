<?php 
require "./core/db_conn.php"; 
$id = $_GET['id'];
$sql = "SELECT * FROM buku WHERE `id` = $id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input buku</title>
</head>
<body>
  <form action="config/cfgUpdBuku.php" method="post">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <label for="judul">Judul</label>
    <input type="text" name="judul" id="judul" value="<?=$data['judul']?>"><br>
    <label for="penerbit">Penerbit</label>
    <input type="text" name="penerbit" id="penerbit" value="<?=$data['penerbit']?>"><br>
    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" id="jumlah" value="<?=$data['jumlah']?>"><br>
    <button type="reset">Reset</button>
    <button type="submit">Update</button>
  </form>
  <a href="index.php">Home</a>
</body>
</html>