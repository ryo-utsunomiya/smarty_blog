<?php

require_once('../../includes/setup.php');

$smarty = new Smarty_Blog();

try {

    $db = getDb();
    $stt = $db->prepare('SELECT id, post_title FROM posts');
    $stt->execute();

    $posts = $stt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOExeption $e) {
    die('error:' . $e->getMessage());
}

$smarty->assign('posts', $posts);

$smarty->display('extends:layout.tpl|admin/delete_list.tpl');