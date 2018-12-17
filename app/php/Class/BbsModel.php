<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-10
 * Time: 18:27
 */

include __DIR__ . '/MySql.php';

class BbsModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Create($userID, $title, $comment, $createdAt, $updatedAt)
    {
        $res = 0;

        $this->dbh->beginTransaction();

        try {
            $sql = 'INSERT INTO `bbs` (`user_id`, `title`, `comment`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?)';

            $data = [$userID, $title, $comment, $createdAt, $updatedAt];

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
        $contents = [];

        $this->dbh->beginTransaction();

        try {
            $sql = 'SELECT '
                .     '`bbs`.`id`, '
                .     '`bbs`.`user_id`, '
                .     '`bbs`.`title`, '
                .     '`bbs`.`comment`, '
                .     '`bbs`.`created_at`, '
                .     '`user`.`name` AS user_name '
                . 'FROM '
                .     '`bbs` '
                . 'LEFT JOIN '
                .     '`user` '
                . 'ON '
                .     '`bbs`.`user_id`=`user`.`id` '
                . 'WHERE '
                .     '`bbs`.`is_deleted`=false '
                . 'ORDER BY '
                .     '`bbs`.`id` DESC ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->execute();

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contents[] = ['id' => $result['id'], 'user_id' => $result['user_id'], 'user_name' => $result['user_name'], 'title' => $result['title'], 'comment' => $result['comment'], 'created_at' => $result['created_at']];
            }

            $this->dbh->commit();

        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->dbh->rollBack();
        }

        return $contents;
    }

    public function Update($id, $title, $comment, $updatedAt)
    {
        $res = 0;

        $this->dbh->beginTransaction();

        try {
            $sql = 'UPDATE `bbs` SET `title`=?, `comment`=?, `updated_at`=? WHERE `id`=? AND `is_deleted`=false';

            $data = [$title, $comment, $updatedAt, $id];

            $stmt = $this->dbh->prepare($sql);

            $stmt->execute($data);

            $res = $id;

            $this->dbh->commit();

        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->dbh->rollBack();
        }

        return $res;
    }

    public function Delete($id)
    {
        $res = 0;

        $this->dbh->beginTransaction();

        try {
            $sql = 'DELETE FROM `bbs` WHERE `id` = :id';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $res = $id;

            $this->dbh->commit();

        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->dbh->rollBack();
        }

        return $res;
    }

    public function getName($id)
    {
        $contents = [];

        $this->dbh->beginTransaction();

        try {
            $sql = 'SELECT '
                .     '`name` AS user_name '
                . 'FROM '
                .     '`user` '
                . 'WHERE '
                .     '`id`=? '
                . 'AND '
                .     '`is_deleted`=false';

            $stmt = $this->dbh->prepare($sql);

            $data = [$id];

            $stmt->execute($data);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $contents = ['user_name' => $result['user_name']];

            $this->dbh->commit();


        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->dbh->rollBack();
        }

        return $contents;
    }
}