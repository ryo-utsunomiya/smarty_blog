{* Smarty *}
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>hello from smarty</title>
</head>
<body>
<div style="width:80%;margin:0 auto;">
    <h1>Smarty Blog　記事一覧</h1>

    <div style="float:left;width:80%;">
        {section name=post loop=$posts}
            <h2><a href="post.php?id={$posts[post]['id']}">{$posts[post]['post_title']}</a></h2>
        {/section}
    </div>
    <div style="float:left;width:20%;">
        <h2>カテゴリー</h2>
        {section name=cat loop=$categories}
            <h3><a href="category_list.php?category_id={$categories[cat]['category_id']}">{$categories[cat]['category_name']}</a></h3>
        {/section}
    </div>
    <div style="clear:both;"></div>
</div>
</body>
</html>
