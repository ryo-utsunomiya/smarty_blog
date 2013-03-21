<?php

class Validator
{
    private $errors;

    /**
     * $_GET/POST/COOKIEのエンコーディングとヌルバイトをチェック
     */
    public function __construct()
    {
        $errors = array();

        $this->checkEncoding($_GET);
        $this->checkEncoding($_POST);
        $this->checkEncoding($_COOKIE);

        $this->checkNull($_GET);
        $this->checkNull($_POST);
        $this->checkNull($_COOKIE);
    }

    /**
     * 与えられた値のエンコーディングがUTF-8になっているかチェック
     * @param array $data 検査対象
     */
    public function checkEncoding(array $data)
    {
        foreach ($data as $key => $value) {
            if (!mb_check_encoding($value, 'UTF-8')) {
                $this->errors[] = "{$key}は不正な文字コードです。";
            }
        }
    }

    /**
     * 与えられた値がヌルバイトを含んでいないかチェック
     * @param array $data 検査対象
     */
    public function checkNull(array $data)
    {
        foreach ($data as $key => $value) {
            if (preg_match('/\n/', $value)) {
                $this->errors[] = "{$key}は不正な文字を含んでいます。";
            }
        }
    }

    public function checkDigit($data)
    {
        if (!ctype_digit($data)) {
            $this->errors[] = '{$data}は数字ではありません。';
        }
        return $data;
    }

    public function __invoke()
    {
        if (count($this->errors) > 0) {
            echo '<ul style="color:red">';
            foreach ($this->errors as $err) {
                echo "<li>{$err}</li>";
            }
            echo '</ul>';
            die();
        }
    }
}
