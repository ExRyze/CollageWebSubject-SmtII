<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location: ./view/home.php");
}
header("Location: ./view/login.php");
