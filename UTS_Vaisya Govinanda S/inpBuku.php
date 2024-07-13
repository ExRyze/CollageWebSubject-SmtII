<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input buku</title>
</head>
<body>
  <a href="index.php">Home</a><br>
  <form action="config/cfgInpBuku.php" method="post">
    <label for="judul">Judul</label>
    <input type="text" name="judul" id="judul"><br>
    <label for="penerbit">Penerbit</label>
    <input type="text" name="penerbit" id="penerbit"><br>
    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" id="jumlah"><br>
    <button type="reset">Reset</button>
    <button type="submit">Submit</button>
  </form>
</body>
</html>