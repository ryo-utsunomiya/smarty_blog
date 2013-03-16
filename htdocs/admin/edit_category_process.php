<?php

if (empty($_POST)) {
    header('location:index.php');
}

require_once('../../includes/setup.php');

try {

    $db = getDb();

    $query = 'UPDATE categories SET category_name = :category_name WHERE category_id = :category_id';
    $stt = $db->prepare($query);
    $stt->bindValue(':category_name', $_POST['category_name']);
    $stt->bindValue(':category_id', $_POST['category_id']);
    $stt->execute();
    $db = null;

} catch (PDOException $e) {
    die('error:' . $e->getMessage());
}

header('location:index.php');