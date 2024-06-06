<?php
function auth() {
  if (!isset($_SESSION['user'])) {
    header("Location: ./../view/login.php");
  }
}