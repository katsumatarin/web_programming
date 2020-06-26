<?php
//(8)回目授業＝課題)
//PHP:コード記述/修正の流れ
//1. [users_insert.php]の処理をマルっとコピー！！
//   [処理の流れ：POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る]
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「users_select.php」に変更

try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root', XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DB Error'.$e->getMessage());
}

//２．POST値取得（POST数に合わせて増やす）
$name      = $_POST["name"];
$lid       = $_POST["lid"];
$lpw       = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg  = $_POST["life_flg"];
$id  = $_POST["id"];


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw, kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":name",      $name);
$stmt->bindValue(":lid",       $lid);
$stmt->bindValue(":lpw",       $lpw);
$stmt->bindValue(":kanri_flg", $kanri_flg);
$stmt->bindValue(":life_flg",  $life_flg);
$stmt->bindValue(":id",  $id);
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
