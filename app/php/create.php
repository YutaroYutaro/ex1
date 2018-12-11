<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 14:32
 */

include __DIR__ . '/Class/Crud.php';

header('Content-type: text/plain; charset= UTF-8');

if (isset($_POST['title']) && isset($_POST['comment'])) {

    $crud = new Crud();
    $result = $crud->create($_POST['title'], $_POST['comment']);

    echo json_encode($result);
} else {
    echo "Fail to ajax request";
}
