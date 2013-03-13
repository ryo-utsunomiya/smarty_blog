<?php

if (empty($_GET['category_id']) || !ctype_digit($_GET['category_id'])) {// 記事idを指定していない or 記事idが数字でない場合はトップページに戻す
    header('location:./index.php');
}

require_once('../includes/setup.php');

try {

    $db = getDb();

    $stt = $db->prepare('SELECT * FROM posts WHERE category_id = :category_id');
    $stt->bindValue(':category_id', $_GET['category_id']);
    $stt->execute();
    $posts = $stt->fetchAll(PDO::FETCH_ASSOC);

    $stt = $db->prepare('SELECT category_name FROM categories WHERE category_id = :category_id');
    $stt->bindValue(':category_id', $_GET['category_id']);
    $stt->execute();
    $category = $stt->fetch(PDO::FETCH_ASSOC);

    $db = null;

} catch (PDOExeption $e) {
    die('error:' . $e->getMessage());
}

$smarty = new Smarty_Blog();
$smarty->assign('posts', $posts);
$smarty->assign('category', $category);
$smarty->display('category_list.tpl');