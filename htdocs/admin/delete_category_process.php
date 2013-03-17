<?php

require_once('../../includes/setup.php');

// 入力値バリデーション
if (empty($_POST)) {
    header('location:index.php');
}

$category_ids = array();

if (is_array($_POST['category_id'])) {// $_POST['category_id']には原則として配列が入る
    foreach ($_POST['category_id'] as $category_id) {
        if (!ctype_digit($category_id)) { // IDが数字でない場合はエラー
            header('location:index.php');
        }
        $category_ids[] = $category_id;
    }
} else {// $_POST['category_id']に配列が入っていない場合はエラー
    header('location:index.php');
}

try {

    $db = getDb();

    foreach ($category_ids as $id) {

        $query = 'DELETE FROM categories WHERE category_id = :id';
        $stt = $db->prepare($query);
        $stt->bindValue(':id', $id);
        $stt->execute();
    }
    $db = null;

} catch (PDOException $e) {
    die('error:' . $e->getMessage());
}

header('location: ./delete_category_list.php');