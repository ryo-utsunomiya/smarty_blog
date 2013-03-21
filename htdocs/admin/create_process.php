<?php
require_once('../../includes/setup.php');

if (empty($_POST)) {
    header('location:index.php');
}

$validator = new Validator(); // $_GET/POST/COOKIEの文字エンコーディングとヌルバイトを検査
$category_id = $validator->checkDigit($_POST['category_id']);

try {

    $db = getDb();

    $query = 'INSERT INTO posts (post_title, post_content, category_id) VALUES (:post_title, :post_content, :category_id)';
    $stt = $db->prepare($query);
    $stt->bindValue(':post_title', $_POST['post_title']);
    $stt->bindValue(':post_content', $_POST['post_content']);
    $stt->bindValue(':category_id', $category_id);
    $stt->execute();

    $db = null;

} catch (PDOException $e) {
    die('error:' . $e->getMessage());
}

header('location:index.php');