<?php
//1.  DB接続します
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBError:'.$e->getMessage());
}

//２．テーブル名"gs_user_table"のSQLを作成
//課題：ソート降順/5レコードのみ取得
$sql = "SELECT * FROM gs_user_table ORDER BY id DESC";
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
        $view .= '<p>'.$res["name"].",".$res["lid"].",".$res["lpw"].",".$res["kanri_flg"].",".$res["life_flg"].'</p>'; //".="は文字と変数をくっつける時に使う
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート：表示画面</title>
</head>
<body>
<h1>USERSテーブル一覧</h1>
<?php
    echo $view; //****ここで変数を表示すること！*****
?>
</body>
</html>
