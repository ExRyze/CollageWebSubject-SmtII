<!-- Selamat siang adik2, saya terlambat ke kelas ya dik
Silahkan dicoba untuk built in fuction 
1. Date
2. ⁠time
3. ⁠mktime
4. ⁠strtotime -->

<?php 
$date = date("d m Y");
$time = time();
$mk = mktime(0,0,0,12,31,2001);
$str = strtotime("next Monday");
var_dump($date, date("H:i:s", $time), date("d m Y H:i:s", $mk), date("d m Y H:i:s", $str));
?>