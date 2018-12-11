<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 15:51
 */

include __DIR__ . '/Class/Crud.php';

header('Content-type: text/plain; charset= UTF-8');

$response = [];

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['comment'])) {
    $errors = [];
    $crud = new Crud();

    $result = $crud->update($_POST['id'], $_POST['title'], $_POST['comment']);

    $data = ['id' => $_POST['id'], 'title' => $_POST['title'], 'comment' => $_POST['comment']];

    if ($result !== 1) $errors[] = '更新に失敗しました．';

    $response = ['err' => $errors, 'data' => $data];

} else {
    $response = ['err' => ['要素が足りません．'], 'data' => []];

}

echo json_encode($response);
