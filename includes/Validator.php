<?php

class Validator
{
    private $errors;

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

    public function checkEncoding(array $data)
    {
        foreach ($data as $key => $value) {
            if (!mb_check_encoding($value)) {
                $this->errors[] = "{$key}は不正な文字コードです。";
            }
        }
    }

    public function checkNull(array $data)
    {
        foreach ($data as $key => $value) {
            if (preg_match('/\n/', $value)) {
                $this->errors[] = "{$key}は不正な文字を含んでいます。";
            }
        }
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
