<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-17
 * Time: 10:48
 */

include __DIR__ . '/MySql.php';

class SignInModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPassword($email) {
        $res = [];

        $this->dbh->beginTransaction();

        try {
            $sql = 'SELECT '
                .     '`user`.`id`, '
                .     '`user`.`password` '
                . 'FROM '
                .     '`user` '
                . 'WHERE '
                .     '`user`.`email`=? ';

            $data = [$email];

            $stmt = $this->dbh->prepare($sql);

            $stmt->execute($data);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $res['password'] = $result['password'];
            $res['user_id'] = $result['id'];

            $this->dbh->commit();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->dbh->rollBack();
        }

        return $res;
    }
}