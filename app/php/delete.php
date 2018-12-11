<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 10:30
 */

include __DIR__ . '/Class/Crud.php';

header('Content-type: text/plain; charset= UTF-8');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $crud = new Crud();
    $result = $crud->delete($id);

    $res = ($result === 1) ? 'delete success: ' . $result : 'delete fail';

    echo json_encode($res);
} else {
    echo "Fail to ajax request";
}