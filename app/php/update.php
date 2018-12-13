<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 15:51
 */

include __DIR__ . '/Class/Crud.php';
include __DIR__ . '/Class/BbsValidation.php';

header('Content-type: text/plain; charset= UTF-8');

$response = [];

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['comment'])) {
    $errors = [];

    $validation = new BbsValidation();

    $idValidation = $validation->IdValidation($_POST['id']);
    $titleValidation = $validation->TitleValidation($_POST['title']);
    $commentValidation = $validation->CommentValidation($_POST['comment']);

    if (!empty($idValidation)) $errors = $errors + $idValidation;

    if (!empty($titleValidation)) $errors = $errors + $titleValidation;

    if (!empty($commentValidation)) $errors = $errors + $commentValidation;

//    $response = ['err' => $errors, 'data' => [$idValidation, $titleValidation, $commentValidation]];

    if (!empty($errors)) {
        $response = ['err' => $errors, 'data' => []];

    } else {
        $crud = new Crud();

        $result = $crud->update($_POST['id'], $_POST['title'], $_POST['comment']);

        $data = ['id' => $_POST['id'], 'title' => $_POST['title'], 'comment' => $_POST['comment']];

        if ($result !== 1) $errors[] = '更新に失敗しました．';

        $response = ['err' => $errors, 'data' => $data];

    }

} else {
    $response = ['err' => ['要素が足りません．'], 'data' => []];

}

echo json_encode($response);
