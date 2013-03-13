<?php
require_once('../includes/setup.php');

try {
    $db = getDb();

    $stt = $db->prepare('SELECT id, post_title FROM posts');//見出し用にタイトルを呼び出し
    $stt->execute();
    $posts = $stt->fetchAll(PDO::FETCH_ASSOC);

    $stt = $db->prepare('SELECT * FROM categories');//カテゴリー呼び出し
    $stt->execute();
    $categories = $stt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOExeption $e) {
    die('error:' . $e->getMessage());
}

$smarty = new Smarty_Blog();
$smarty->assign('posts', $posts);
$smarty->assign('categories', $categories);
$smarty->display('index.tpl');