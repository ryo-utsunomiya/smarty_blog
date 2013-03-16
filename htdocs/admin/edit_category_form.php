<?php

if (empty($_GET['category_id']) || !ctype_digit($_GET['category_id'])) {// idを指定していない or idが数字でない場合はトップページに戻す
    header('location: ./index.php');
}

require_once('../../includes/setup.php');

try {

    $db = getDb();
    $stt = $db->prepare('SELECT * FROM categories WHERE category_id = :id');
    $stt->bindValue(':id', $_GET['category_id']);
    $stt->execute();

    $category = $stt->fetch(PDO::FETCH_ASSOC);

} catch (PDOExeption $e) {
    die('error:' . $e->getMessage());
}

$smarty = new Smarty_Blog();
$smarty->assign('category', $category);

$smarty->display($smarty->tpl);