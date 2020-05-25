<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<?php
// 変数の情報表示
$hoge = "school";
var_dump($hoge); 

echo "<br>";

// 変数表示
echo $hoge;

echo "<br>";

// 日付表示
echo date("Y年m月j日 H時i分s秒");
echo "<br>";
echo date("Y年m月d日 H時i分s秒");
echo "<br>";

// 文字列の長さ表示
$length = strlen("abcde");
echo $length; 
echo "<br>";

// 文字列の一部分を表示
$hoge = substr($hoge, 3);
echo $hoge; 
echo "<br>";

// 数字のフォーマット
$price = 10000;
echo $price; 
echo "<br>";
$price2 = number_format($price);
echo $price2; 
echo "<br>";

?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>