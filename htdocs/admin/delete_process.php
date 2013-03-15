<?php

require_once('../../includes/setup.php');

// 入力値バリデーション
if (empty($_POST)) {
    header('location:index.php');
}

$post_ids = array();

if (is_array($_POST['post_id'])) {// $_POST['post_id']には原則として配列が入る
    foreach ($_POST['post_id'] as $post_id) {
        if (!ctype_digit($post_id)) { // 記事IDが数字でない場合はエラー
            header('location:index.php');
        }
        $post_ids[] = $post_id;
    }
} else {// _POST['post_id']に配列が入っていない場合はエラー
    header('location:index.php');
}

try {

    $db = getDb();

    foreach ($post_ids as $id) {

        $query = 'DELETE FROM posts WHERE id = :id';
        $stt = $db->prepare($query);
        $stt->bindValue(':id', $id);
        $stt->execute();
    }
    $db = null;

} catch (PDOException $e) {
    die('error:' . $e->getMessage());
}

header('location: ./delete_list.php');