<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 10:30
 */

include __DIR__ . '/Class/Crud.php';

header('Content-type: text/plain; charset= UTF-8');

$response = [];

if (isset($_POST['id'])) {
    $errors = [];

    $crud = new Crud();

    $result = $crud->delete($_POST['id']);

    if ($result === 0) $errors[] = '削除に失敗しました．';

    $data = ['id' => $_POST['id']];

    $response = ['err' => $errors, 'data' => $data];

} else {
    $response = ['err' => ['要素が足りません．'], 'data' => []];

}

echo json_encode($response);
