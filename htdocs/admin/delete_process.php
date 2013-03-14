<?php

//debug($_POST);

// 入力値バリデーション
if (empty($_POST)) {
    header('location:index.php');
}



$post_ids = array();

if (is_array($_POST['post_id'])) {
    foreach ($_POST['post_id'] as $post_id) {
        if (!ctype_digit($post_id)) { // 記事IDが数字で無い場合はエラー
            header('location:index.php');
        }
        $post_ids[] = $post_id;
    }
}

require_once('../../includes/setup.php');

try {

    $db = getDb();

    $query = 'UPDATE posts SET post_title = :post_title, post_content = :post_content WHERE id = :id';
    $stt = $db->prepare($query);
    $stt->bindValue(':post_title', $_POST['post_title']);
    $stt->bindValue(':post_content', $_POST['post_content']);
    $stt->bindValue(':id', $_POST['id']);
    $stt->execute();
    $db = null;

} catch (PDOException $e) {
    die('error:' . $e->getMessage());
}

header('location:index.php');