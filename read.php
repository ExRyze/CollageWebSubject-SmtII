
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="read.css">
</head>
<body>
    <table>
        <tr>
            <th><p>No</p></th>
            <th><p>Nama</p></th>
            <th><p>Nim</p></th>
            <th><p>password</p></th>
        </tr>
        <tr>
        <?php
            include 'konek.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from mahasiswa");
            while($d = mysqli_fetch_array($data)){

    
            ?>
        <td>
            <?php echo $no++; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['nim']; ?></td>
            <td><?= $d['password'] ?></td>
            
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>