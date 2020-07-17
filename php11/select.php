<?php
session_start();


if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    exit("Login Error");
}else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
}


//(7回目授業/8回目授業)
//1.  DB接続します
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBError:'.$e->getMessage());
}

//２．テーブル名"gs_an_table"のSQLを作成
$sql = "SELECT * FROM gs_an_table ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view=""; //表示用文字列を格納する変数
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //Selectデータで取得したレコードの数だけ自動でループする
    while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>';
        $view .= $res["name"];
        $view .= '<a href="delete.php?id='.$res["id"].'">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</p>'; //".="は文字と変数をくっつける時に使う
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート：一覧表示画面</title>
</head>
<body>
<a href="logout.php">LOGOUT</a>
<?php
   //表示用変数
   echo $view;
?>
</body>
</html>
