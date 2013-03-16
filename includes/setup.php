<?php

// ディレクトリ設定
if ($_SERVER['HTTP_HOST'] === 'localhost') {// ローカル環境
    define('SMARTY_DIR', '/Users/ryo/Sites/smarty_blog/Smarty-3.1.13/libs/');
    define('DB_DIR', '');
    define('WEB_DIR', '/Users/ryo/Sites/smarty_blog/');
    define('REPLACE_DIR', '/~ryo/smarty_blog/htdocs/');
    date_default_timezone_set('Asia/Tokyo');// ローカルでtimezone未設定エラーを防止
} else {// VPS
    define('SMARTY_DIR', '/usr/local/lib/Smarty-3.1.13/libs/');
    define('DB_DIR', '/usr/local/lib/');
    define('WEB_DIR', '/var/www/dev.example.com/public_html/smarty_blog/');
    define('REPLACE_DIR', '/smarty_blog/');
}

// Smartyライブラリを読み込み
require_once(SMARTY_DIR . 'Smarty.class.php');

// 必要なライブラリファイルを読み込み
require_once(DB_DIR . 'getDb.php'); // PDOオブジェクトを返すgetDb()を定義
require_once('functions.php'); // ユーティリティ関数を定義

class Smarty_Blog extends Smarty
{
    public $tpl; // 表示するテンプレートのデフォルト値

    public function __construct()
    {
        parent::__construct();

        $this->template_dir = WEB_DIR . 'templates/';
        $this->compile_dir = WEB_DIR . 'templates_c/';
        $this->config_dir = WEB_DIR . 'configs/';
        $this->cache_dir = WEB_DIR . 'cache/';

        $this->caching = false; // テスト環境で変更を確実に反映させるためfalse
        $this->escape_html = true; // 変数出力時にHTMLエスケープを適用

        // 表示するテンプレートのデフォルト値を設定（デフォルト：.phpファイルと同名の.tplファイルを呼び出し）
        $this->tpl = str_replace('.php', '.tpl', $_SERVER['SCRIPT_NAME']);
        $this->tpl = str_replace(REPLACE_DIR, '', $this->tpl);
        $this->tpl = 'extends:layout.tpl|' . $this->tpl;// レイアウト用のテンプレートを継承
    }
}
