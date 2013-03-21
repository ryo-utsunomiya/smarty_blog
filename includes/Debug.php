<?php
 
class Debug
{
    /**
     * 与えられた変数を表示してプログラムを終了
     * @param $value 表示する変数
     */
    public static function show($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        exit;
    }
}
