<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 14:32
 */

include __DIR__ . '/Class/BbsModel.php';
include __DIR__ . '/Class/BbsValidation.php';

header('Content-type: text/plain; charset= UTF-8');

$response = [];

if (isset($_POST['title']) && isset($_POST['comment'])) {
    $errors = [];

    $validation = new BbsValidation();

    $titleValidation = $validation->TitleValidation($_POST['title']);
    $commentValidation = $validation->CommentValidation($_POST['comment']);

    if (!empty($titleValidation)) $errors = $errors + $titleValidation;
    if (!empty($commentValidation)) $errors = $errors + $commentValidation;

    if (!empty($errors)) {
        $response = ['err' => $errors, 'data' => []];

    } else {
        $crud = new BbsModel();

        $now = new DateTime('now');

        $createdAt = $now->format('Y-m-d H:i:s');

        $id = $crud->create(1, $_POST['title'], $_POST['comment'], $createdAt, $createdAt);

        if ($id === 0) $errors['db_error'] = '新規作成に失敗しました．';

        $data = ['id' => $id,'title' => $_POST['title'], 'comment' => $_POST['comment'], 'created_at' => $createdAt];

        $response = ['err' => $errors, 'data' => $data];

    }
} else {
    $response = ['err' => ['server_error' => '要素が足りません．'], 'data' => []];
}

echo json_encode($response);
