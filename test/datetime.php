<!-- Selamat siang adik2, saya terlambat ke kelas ya dik
Silahkan dicoba untuk built in fuction 
1. Date
2. ⁠time
3. ⁠mktime
4. ⁠strtotime -->
<?php
echo 'Default Timezone: ' . date('d-m-Y H:i:s') . '</br>';
date_default_timezone_set('Asia/Jakarta');
echo 'Indonesian Timezone: ' . date('d-m-Y H:i:s')."<br>"."<br>";
?>

<?php 
$date = date("d m Y");
$time = time();
$mk = mktime(0,0,0,12,31,2001);
$str = strtotime("now");
echo $time."<br>";
echo (date("H:i:s", $time))."<br>";
echo (date("d m Y H:i:s", $mk))."<br>";
echo (date("d m Y H:i:s", $str))."<br>";
?>