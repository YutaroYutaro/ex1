<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-13
 * Time: 16:45
 */

include __DIR__ . '/Class/SignUpModel.php';
include __DIR__ . '/Class/UserValidation.php';

header('Content-type: text/plain; charset= UTF-8');

$response = [];

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
    $errors = [];

    $validation = new UserValidation();

    $emailValidation = $validation->EmailValidation($_POST['email']);
    $passwordValidation = $validation->PasswordValidation($_POST['password']);
    $nameValidation = $validation->NameValidation($_POST['name']);

    if (!empty($emailValidation)) $errors = $errors + $emailValidation;
    if (!empty($passwordValidation)) $errors = $errors + $passwordValidation;
    if (!empty($nameValidation)) $errors = $errors + $nameValidation;

    if (!empty($errors)) {
        $response = ['err' => $errors, 'data' => []];

    } else {
        $signUp = new SignUpModel();

        $now = new DateTime('now');

        $createdAt = $now->format('Y-m-d H:i:s');

        $id = $signUp->insertUserData($_POST['email'], password_hash($_POST['password'], PASSWORD_BCRYPT), $_POST['name'], $createdAt, $createdAt);

        if ($id === 0) {
            $errors['db_error'] = '新規作成に失敗しました．';
        } else {
            session_start();
            $_SESSION['user_id'] = $id;
        }

        $data = ['id' => $_SESSION['user_id'],'email' => $_POST['email'], 'password' => $_POST['password'], 'created_at' => $createdAt, 'updated_at' => $createdAt];

        $response = ['err' => $errors, 'data' => $data];

    }
} else {
    $response = ['err' => ['server_error' => '要素が足りません．'], 'data' => []];

}

echo json_encode($response);
