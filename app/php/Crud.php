<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-10
 * Time: 18:27
 */

include __DIR__ . '/MySql.php';

class Crud extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Create($title, $comment)
    {

    }

    public function Read()
    {
        $sql = 'SELECT * FROM `bbs`';

        $stmt = $this->dbh->prepare($sql);

        $stmt->execute();

        $contents = [];

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contents[] = ['id' => $result['id'], 'title' => $result['title'], 'comment' => $result['comment'], 'created_at' => $result['created_at']];
        }

        return $contents;
    }

    public function Update($id, $title, $comment)
    {

    }

    public function Delete($id)
    {

    }
}