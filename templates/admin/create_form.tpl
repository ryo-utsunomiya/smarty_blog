{* Smarty *}
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事の新規作成</title>
</head>
<body>
<form action="create_process.php" method="post">
<p>
タイトル:
<input type="text" name="post_title" value="">
</p>
<p>
記事本文：
<textarea name="post_content" cols="30" rows="10"></textarea>
</p>
<input type="submit" value="投稿">
</form>
</body>
</html>
