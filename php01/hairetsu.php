<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<?php
$city_names = array("渋谷", "新宿", "池袋");
var_dump($city_names);
echo "<br>";

$city_names = array(1 => "渋谷",  2 => "新宿", 3 => "池袋");
var_dump($city_names);
echo "<br>";

$city_names = [1 => "渋谷", 2 => "新宿", 3 => "池袋"];
var_dump($city_names);
echo "<br>";

echo "取り出し:";
echo $city_names[1];
echo "<br>";
echo $city_names[3];
?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>