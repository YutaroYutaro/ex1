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

    public function Create($title, $comment, $createdAt)
    {
        $res = 0;

        $this->dbh->beginTransaction();

        try {
            $sql = 'INSERT INTO `bbs` (`title`, `comment`, `created_at`) VALUES (?, ?, ?)';

            $data = [$title, $comment, $createdAt];

            $stmt = $this->dbh->prepare($sql);

            $stmt->execute($data);

            $res = $this->dbh->lastInsertId('id');

            $this->dbh->commit();

        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->dbh->rollBack();
        }

        return $res;
    }

    public function Read()
    {
        $sql = 'SELECT * FROM `bbs` ORDER BY `id` DESC';

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
        $res = 0;
        $error = 'update query fail...';

        try{
            $sql = 'UPDATE `bbs` SET `title`=?, `comment`=? WHERE `id`=?';

            $data = [$title, $comment, $id];

            $stmt = $this->dbh->prepare($sql);

            $stmt->execute($data);

            $res = $stmt->rowCount();

        } catch (PDOException $e) {
            $error = $e->getMessage();
        }

        return empty($res) ? $error : $res;
    }

    public function Delete($id)
    {
        $res = 0;
        $error = 'delete query fail...';

        try {
            $sql = 'DELETE FROM `bbs` WHERE `id` = :id';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $res = $stmt->rowCount();

        } catch (PDOException $e) {
            $error = $e->getMessage();
        }

        return empty($res) ? $error : $res;
    }
}