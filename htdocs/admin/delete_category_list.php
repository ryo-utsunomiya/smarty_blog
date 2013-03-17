<?php

require_once('../../includes/setup.php');

$smarty = new Smarty_Blog();

try {

    $db = getDb();
    $stt = $db->prepare('SELECT category_id, category_name FROM categories');
    $stt->execute();

    $categories = $stt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOExeption $e) {
    die('error:' . $e->getMessage());
}

$smarty->assign('categories', $categories);

$smarty->display('extends:layout.tpl|admin/delete_category_list.tpl');