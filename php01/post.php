<html>
<head>
<meta charset="utf-8">
<title>POST練習</title>
</head>
<body>
<form action="post_confirm.php" method="post">
	<p>お名前（必須）: <input type="text" name="name" placeholder="山田太郎"></p>
	<p>EMAIL : <input type="text" name="mail" placeholder="ymd@sample.jp"></p>
	<p>性別（必須）:
	<input type="radio" name="gender" id="male" value="男性"><label for ="male">男性</label>
	<input type="radio" name="gender" id="female" value="女性"><label for ="female">女性</label>
	</p>
	<p>コメント<br> <textarea name="comment" rows="3" cols="30"></textarea></p>
	<input type="submit" value="送信">
</form>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>