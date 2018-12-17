<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-17
 * Time: 10:10
 */

include __DIR__ . '/Class/SignInModel.php';
include __DIR__ . '/Class/UserValidation.php';

$response = [];

if (isset($_POST['email']) && isset($_POST['password'])) {
    $errors = [];

    $validation = new UserValidation();

    $emailValidation = $validation->EmailValidation($_POST['email']);
    $passwordValidation = $validation->PasswordValidation($_POST['password']);

    if (!empty($emailValidation)) array_merge($errors, $emailValidation);
    if (!empty($passwordValidation)) array_merge($errors, $passwordValidation);

    if (!empty($errors)) {
        $response = ['err' => $errors, 'data' => []];

    } else {
        $signIn = new SignInModel();

        $signInRes = $signIn->getPassword($_POST['email']);

        if (isset($signInRes['user_id']) && password_verify($_POST['password'], $signInRes['password'])) {
            session_start();
            $_SESSION['user_id'] = $signInRes['user_id'];

        } else {
            $errors['login_error'] = 'メールアドレスまたはパスワードが間違っています．';

        }

        $data = ['email' => $_POST['email'], 'password' => $signInRes['password']];

        $response = ['err' => $errors, 'data' => $data];

    }

} else {
    $response = ['err' => ['server_error' => '要素が足りません．'], 'data' => []];

}

echo json_encode($response);