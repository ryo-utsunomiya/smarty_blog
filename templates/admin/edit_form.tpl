{* Smarty *}
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事の編集</title>
</head>
<body>
<form action="edit_process.php" method="post">
<input type="hidden" name="id" value="{$post['id']}" />
<p>
タイトル:
<input type="text" name="post_title" value="{$post['post_title']}">
</p>
<p>
記事本文：
<textarea name="post_content" cols="30" rows="10">{$post['post_content']}</textarea>
</p>
<input type="submit" value="投稿">
</form>
</body>
</html>
