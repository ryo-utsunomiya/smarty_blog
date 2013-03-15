<?php
require_once('../../includes/setup.php');

if (empty($_POST['category_name'])) {
    header('location:index.php');
}

$category_name = trim($_POST['category_name']);// 前後の空白除去
if (mb_strlen($category_name) > 50) {// カテゴリー名は50文字以内
    header('location:index.php');
}

try {

    $db = getDb();

    $query = 'INSERT INTO categories (category_name) VALUES (:category_name)';
    $stt = $db->prepare($query);
    $stt->bindValue(':category_name', $category_name);
    $stt->execute();
    $db = null;

} catch (PDOException $e) {
    die('error:' . $e->getMessage());
}

header('location:add_category_form.php');