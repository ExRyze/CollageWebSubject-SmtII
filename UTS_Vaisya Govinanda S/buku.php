<?php 
require "./core/db_conn.php"; 
$sql = "SELECT * FROM buku";
$data = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data buku</title>
</head>
<body>
  <a href="index.php">Home</a><br>
  <a href="inpBuku.php">Input</a><br>
  <table>
    <tr>
      <th>Id</th>
      <th>Judul</th>
      <th>Penerbit</th>
      <th>Jumlah</th>
      <th>Action</th>
    </tr>
    <?php foreach ($data as $buku) { ?>
      <tr>
        <td><?=$buku['id']?></td>
        <td><?=$buku['judul']?></td>
        <td><?=$buku['penerbit']?></td>
        <td><?=$buku['jumlah']?></td>
        <td>
          <a href="updBuku.php?id=<?=$buku['id']?>" style="margin-right: 0.5rem;">Update</a>
          <a href="./config/cfgDelBuku.php?id=<?=$buku['id']?>">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>