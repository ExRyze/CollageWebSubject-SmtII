<?php
include "./../core/db_conn.php";

$qry = "select * from users";
$result = $conn->query($qry);
