{* Smarty *}
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>hello from smarty</title>
</head>
<body>
<div style="width:80%;margin:0 auto;">
    <h1>カテゴリー「{$category['category_name']}」の記事一覧</h1>

    <div style="float:left;width:80%;">
        {section name=post loop=$posts}
            <h2><a href="post.php?id={$posts[post]['id']}">{$posts[post]['post_title']}</a></h2>
        {/section}
    </div>
    <div style="clear:both;"></div>
</div>
</body>
</html>
