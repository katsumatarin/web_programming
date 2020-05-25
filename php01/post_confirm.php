<!-- アンケート集計やろうと思ったのですが
面倒になって途中でやめました。 -->

<?php
function h($value) {
    return htmlspecialchars($value,ENT_QUOTES);
}
$flg = 0;
$name = $_POST["name"];
$mail = $_POST["mail"];
$gender = $_POST["gender"];
$comment = $_POST["comment"];
if($name=="" && $gender==""){
    $name = "未入力";
    $gender = "未入力";
    $flg = 1;
    $file = fopen("data/data.txt","a");
    fwrite($file, "必須項目未入力"."\n");
    fclose($file);
}
if($name==""){
    $name = "未入力";
    $flg = 2;
    $file = fopen("data/data.txt","a");
    fwrite($file, "必須項目未入力"."\n");
    fclose($file);
}
if($gender==""){
    $gender = "未入力";
    $flg = 3;
    $file = fopen("data/data.txt","a");
    fwrite($file, "必須項目未入力"."\n");
    fclose($file);
}
if($mail==""){
    $mail = "未入力";
}
if($comment==""){
    $comment = "未入力";
}
if($flg==0){
    $file = fopen("data/data.txt","a");
    fwrite($file, $name." , ".$mail." , ".$gender." , ".$comment."\n");
    fclose($file);
}
    $results[0] = 0;
    $results[1] = 0;
    $results[18] = 0;
?>
<html>
<head>
<meta charset="utf-8">
<title>POST（受信）</title>
</head>
<body>
<h1><?php 
    if($flg == 0){
        $alert = "<script type='text/javascript'>alert('送信しました');</script>";
        echo $alert;
        echo "確認画面";
        if($gender == "男性") $results[0] ++;
        if($gender == "女性") $results[1] ++;
        $results[18] ++;
    }
    if($flg == 1 || $flg == 2 ||$flg == 3){ 
        $alert = "<script type='text/javascript'>alert('必須項目が未入力です');</script>";
        echo $alert;
        echo "確認画面";?>
        <style>
        .small{ font-size: 0.5em; }
        </style>
        <span class="small"><?php 
        echo "※戻るボタンを押して必須項目の入力をしてください"; ?>
        </span><?php
    }?>
</h1>
<p>お名前（必須）：<?php echo $name; ?></p>
<p>EMAIL：<?php echo $mail; ?></p>
<p>性別（必須）：<?php echo $gender; ?></p>
<p>コメント：<?php echo $comment; ?></p>
<?php 
    if($flg == 1 || $flg == 2 ||$flg == 3){ ?>
        <form action="post.php" method="post_confirm.php">
        <button>入力画面に戻る</button></form> <?php
    }
?>
<?php
    if($results[18] == 0){
        echo '<p>アンケートの集計結果：総数0件</p>';
    } else {
        echo '<p>アンケートの集計結果：総数 ' . $results[18] . ' 件</p>';
    }
?>
<table>
  <thead>
  <tr>
  <th>質問</th>
  <th>人数</th>
  <th>比率</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>　性別　</td>
  <td><?php 
        if($results[18] == 0){
            echo "　男性：0人　<br />";
            echo "　女性：0人　";
        } else {
            echo "　男性：".$results[0]."人　<br />"; 
            echo "　女性：".$results[1]."人　"; 
        }?>
  </td>
  <td><?php 
        if($results[18] == 0){
            echo "　男性：0％　<br />";
            echo "　女性：0％　<br />";
        } else {
            echo "　男性：" .$results[0]/$results[18]*100 ."％　<br />";
            echo "　女性：" .$results[1]/$results[18]*100 ."％　<br />";
        }?>
  </td>
  </tr>
  <tr>
  <td>　年齢　</td>
  </tr>
  </tbody>
</table>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>