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
    exit("*SQL Error:".$error[2]);
}else{
    //Selectデータで取得したレコードの数だけ自動でループする
    while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<tr>';
        $view .= '<td>';
        $view .= '<a href="users_detail.php?id='.$res["id"].'">';
        $view .= $res["id"];
        $view .= '</a>';
        $view .= '</td>';
        $view .= '<td>'.$res["name"].'</td>';
        $view .= '<td>'.$res["lid"].'</td>';
        $view .= '<td>'.$res["lpw"].'</td>';
        $view .= '<td>'.$res["kanri_flg"].'</td>';
        $view .= '<td>'.$res["life_flg"].'</td>';
        $view .= '</tr>'.PHP_EOL;  //PHP_EOLは改行コード!!
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>アンケート：表示画面</title>
    <style>
        td {
            border: 1px solid #ccc;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>USERSテーブル一覧</h1>
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>login_id</td>
            <td>login_pw</td>
            <td>kanri_flg</td>
            <td>life_flg</td>
        </tr>

        <?php
            echo $view;
        ?>

    </table>
</body>

</html>
