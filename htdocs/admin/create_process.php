<?php
require_once('../../includes/setup.php');

if (empty($_POST)) {
    header('location:index.php');
}

try {

    $db = getDb();

    $query = 'INSERT INTO posts (post_title, post_content) VALUES (:post_title, :post_content)';
    $stt = $db->prepare($query);
    $stt->bindValue(':post_title', $_POST['post_title']);
    $stt->bindValue(':post_content', $_POST['post_content']);
    $stt->execute();
    $db = null;

} catch (PDOException $e) {
    die('error:' . $e->getMessage());
}

header('location:index.php');