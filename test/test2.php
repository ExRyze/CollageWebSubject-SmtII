<!-- built-in function string
1. strlen()
2. strcmp()
3. explode()
4.htmlspecialchars()

utility:
1. var_dump()
2. isset()
3. empty()
4. die()
5. sleep() -->

<?php
echo "========== built-in function string ==========<br>";
$str1 = "Hello World!";
echo "Str 1 = ".$str1."<br>";
$str2 = "Hello!";
echo "Str 2 = ".$str2."<br><br>";

$len = strlen($str1);
echo "Str 1 lenght = ".$len."<br>";

$cmp = strcmp($str1, $str2);
echo "Comparasion Str 1 with Str 2 = ".$cmp."<br>";

$exp = explode(" ", $str1);
echo "Explode = ";
var_dump($exp);
echo "<br><br>";

$spc = "<b>".$str1."</b>";
echo $spc."<br>";
$html = htmlspecialchars($spc);
echo "HTML special chars = ".$html."<br>";
echo "<br><br>";


echo "========== utility ==========<br>";
$test = "true";

if (isset($test)) {
  var_dump($test);
  echo "<br>Sleep for 3 Seconds<br>";
  echo (date("d m Y H:i:s"))."<br>";
  sleep(3);
  echo (date("d m Y H:i:s"))."<br>";
  if(empty($test)) {
    echo "Test is empty<br>";
  } else {
    die("Test is not empty<br>");
  }
}
?>