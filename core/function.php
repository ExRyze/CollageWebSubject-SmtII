<?php

function image($id) {
  $nameFile=$_FILES['image']['name'];
  $typeFile=$_FILES['image']['type'];
  $sizeFile=$_FILES['image']['size'];
  $errorFile=$_FILES['image']['error'];
  $pathFile=$_FILES['image']['tmp_name'];

  if ($errorFile === 4) {
      return null;
  } else {
    $formatValid=['jpg','jpeg','png','webp'];
    $format=explode('.',$nameFile);
    $format=strtolower(end($format));
    if (!in_array($format,$formatValid)) {
        header("Location: ./../view/editUser.php?error=Format gambar salah!&id=$id");
    }
    
    if ($sizeFile > 10000) {
      header("Location: ./../view/editUser.php?error=File melebihi batas maximum!&id=$id");
    }
  
    $nameFilebaru=uniqid().'.'.$format;
    move_uploaded_file($pathFile,'./../img/'.$nameFilebaru);
    return 'img/'.$nameFilebaru;
  }
}

function updateSelf($id, $result) {
  if ($_SESSION['user']['id'] === $id) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $row;
  }
}