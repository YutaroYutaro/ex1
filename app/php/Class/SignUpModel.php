<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-13
 * Time: 16:54
 */

include __DIR__ . '/MySql.php';

class SignUpModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUserData($email, $password, $name, $createdAt, $updatedAt) {
        $res = 0;

        $this->dbh->beginTransaction();

        try {
            $sql = 'INSERT INTO `user` (`email`, `password`, `name`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?)';

            $data = [$email, $password, $name, $createdAt, $updatedAt];

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
}
