<?php

require_once('../../includes/setup.php');

try {

    $db = getDb();
    $stt = $db->prepare('SELECT category_id, category_name FROM categories');
    $stt->execute();

    $categories = $stt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOExeption $e) {
    die('error:' . $e->getMessage());
}

$smarty = new Smarty_Blog();
$smarty->assign('categories', $categories);
$smarty->display($smarty->tpl);