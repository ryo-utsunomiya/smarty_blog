{* Smarty *}
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>hello from smarty</title>
</head>
<body>
<h1>Smarty Blog</h1>

<h2><a href="post.php?id={$post['id']}">{$post['post_title']}</a></h2>
<p>{$post['post_content']}</p>

</body>
</html>
