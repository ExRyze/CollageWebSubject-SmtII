<?php
    if (isset($_POST['fname']) && $_POST['lname']) {
       $nama = $_POST['fname'];
       $lname = $_POST['lname'];

       echo "<h1> INFORMASI FORM </h1>";
       echo "<p> first name : $nama </p>";
       echo "<p> last name : $lname</p>";
    }else {
        echo "salah input";
    }
?>