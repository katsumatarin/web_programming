<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<?php
$int_age = 10; // 数値型（int型）
$str_age = "10"; // 文字列型（String型）
// これらは別モノ
var_dump($int_age);
echo "<br>";
var_dump($str_age);
echo "<br>";
$sato_age = 30;
$yamada_age = "25";
$total_age = $sato_age + $yamada_age;
var_dump($total_age);
echo "<br>";
$total_age = $sato_age . $yamada_age;
var_dump($total_age);
?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>