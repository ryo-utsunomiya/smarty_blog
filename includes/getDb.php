<?php
function getDb() {
    $dsn = 'mysql:dbname=smarty_blog; host=127.0.0.1';
    $usr = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $usr, $password);
        $db->exec('SET NAMES utf8');
    } catch (PDOException $e) {
        die('connection error:' . $e->getMessage());
    }
    return $db;
}