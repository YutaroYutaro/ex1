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

        if ($this->EmailFormat($email)) $errors['email_format'] = 'メールアドレスの形式が正しくありません．';

        return $errors;
    }

    public function PasswordValidation($password) {
        $errors = [];

        if ($this->MaxSize($password, 50)) $errors['password_length'] = 'パスワードは50文字以内で入力してください．';

        return $errors;
    }

    public function NameValidation($name) {
        $errors = [];

        if ($this->MaxSize($name, 15)) $errors['name_length'] = '表示名は15文字以内で入力してください．';

        return $errors;
    }
}
