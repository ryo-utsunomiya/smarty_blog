<?php

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {// 記事idを指定していない or 記事idが数字でない場合はトップページに戻す
    header('location: ./index.php');
}

require_once('../../includes/setup.php');

try {

    $db = getDb();
    $stt = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $stt->bindValue(':id', $_GET['id']);
    $stt->execute();

    $post = $stt->fetch(PDO::FETCH_ASSOC);

} catch (PDOExeption $e) {
    die('error:' . $e->getMessage());
}

$smarty = new Smarty_Blog();
$smarty->assign('post', $post);
$smarty->display('admin/edit_form.tpl');