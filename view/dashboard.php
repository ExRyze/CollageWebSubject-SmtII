<?php 
session_start();
include "./../core/middleware.php";
include "./../query/userAll.php";
auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>
  <h1>Hello World!</h1>
  <p>You're <?= $_SESSION['user']['username'] ?></p>
  <hr>
  <h3>Data User</h3>
  <table border="1">
    <tr>
      <th>Id</th>
      <th>Image</th>
      <th>Username</th>
      <th>CreatedAt</th>
      <th>UpdatedAt</th>
      <th>Action</th>
    </tr>
    <?php 
    if($result = $conn->query($qry))
    {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>".$row['id']."</td>
          <td><img width='100' height='100' src='./../".$row['img']."' alt='".$row['username']."'></td>
          
          <td>".$row['username']."</td>
          <td>".$row['createdAt']."</td>
          <td>".$row['updatedAt']."</td>
          <td>
            <a href='./editUser.php?id=".$row['id']."'>edit</a>
            <a href='./hapusUser.php?id=".$row['id']."'>hapus</a>
          </td>
        </tr>";
      }
      $result->free();
    }
    ?>
  </table>
  <a href="./../config/cf_logout.php">logout</a>
</body>
</html>