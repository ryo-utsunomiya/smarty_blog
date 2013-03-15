<?php

ini_set('display_errors', 1); // デバッグ用にエラー表示

// Smartyライブラリを読み込み
require_once('/usr/local/lib/Smarty-3.1.13/libs/Smarty.class.php');

// 必要なライブラリファイルを読み込み
require_once('/usr/local/lib/getDb.php'); // PDOオブジェクトを返すgetDb()を定義
require_once('functions.php'); // ユーティリティ関数を定義

class Smarty_Blog extends Smarty
{
    public $tpl; // 表示するテンプレートのデフォルト値

    public function __construct()
    {
        parent::__construct();

        $this->template_dir = '/var/www/dev.example.com/public_html/smarty_blog/templates/';
        $this->compile_dir = '/var/www/dev.example.com/public_html/smarty_blog/templates_c/';
        $this->config_dir = '/var/www/dev.example.com/public_html/smarty_blog/configs/';
        $this->cache_dir = '/var/www/dev.example.com/public_html/smarty_blog/cache/';

        $this->caching = false; // テスト環境で変更を確実に反映させるためfalse
        $this->escape_html = true; // 変数出力時にHTMLエスケープを適用

        // 表示するテンプレートのデフォルト値を設定（デフォルト：.phpファイルと同名の.tplファイルを呼び出し）
        $this->tpl = str_replace('.php', '.tpl', $_SERVER['SCRIPT_NAME']);
        $this->tpl = str_replace('/smarty_blog/', '', $this->tpl);
        $this->tpl = 'extends:layout.tpl|' . $this->tpl;
    }
}