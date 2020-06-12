<?php
//1.  DB接続します
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBError'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT id,name,email,age FROM gs_an_table"; //SQL問題:select文で表示するカラムを指定："id, name, email, age" のみ表示
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
        $view .= $res["id"].",".$res["name"].",".$res["email"].",".$res["age"]."<br>"; //".="は文字と変数をくっつける時に使う
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
        <?php
        //表示用変数
        echo $view;
        ?>
    </body>
</html>
