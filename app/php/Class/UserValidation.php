<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-13
 * Time: 16:54
 */

include __DIR__ . '/Validation.php';

class UserValidation extends Validation
{
    public function EmailValidation($email) {
        $errors = [];

        return $errors;
    }

    public function PasswordValidation($password) {
        $errors = [];

        return $errors;
    }

    public function NameValidation($name) {
        $errors = [];

        return $errors;
    }
}
