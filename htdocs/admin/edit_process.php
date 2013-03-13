<?php

if (empty($_POST)) {
    header('location:index.php');
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