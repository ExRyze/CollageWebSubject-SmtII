<?php
include "./../core/db_conn.php";

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE `id`='$id'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();