<?php

ini_set('display_errors', 1);// デバッグ用にエラー表示

// Smartyライブラリを読み込み
require_once('/usr/local/lib/Smarty-3.1.13/libs/Smarty.class.php');

// 必要なライブラリファイルを読み込み
require_once('/usr/local/lib/getDb.php');
require_once('functions.php');

class Smarty_Blog extends Smarty {

   public function __construct()
   {
        parent::__construct();

        $this->template_dir = '/var/www/dev.example.com/public_html/smarty_blog/templates/';
        $this->compile_dir  = '/var/www/dev.example.com/public_html/smarty_blog/templates_c/';
        $this->config_dir   = '/var/www/dev.example.com/public_html/smarty_blog/configs/';
        $this->cache_dir    = '/var/www/dev.example.com/public_html/smarty_blog/cache/';

        $this->caching = false;// テスト環境で変更を確実に反映させるためfalse
        //$this->assign('app_name', 'Blog');
   }
}