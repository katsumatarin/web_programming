<?php
//1.  DB接続します
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root', XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DB Error'.$e->getMessage());
}

//２．POST値取得（POST数に合わせて増やす）
$id      = $_GET["id"];


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "DELETE FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":id",      $id);
$status = $stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL Error:".$error[2]);
}else{
    header("Location: users_select.php");
    exit();
}


?>
