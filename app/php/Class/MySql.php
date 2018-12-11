<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-10
 * Time: 17:52
 */

class MySql
{
    private $dbIni;

    private $dsn;
    private $user;
    private $password;

    protected $dbh;

    public function __construct()
    {
        $this->dbIni = parse_ini_file(__DIR__ . '/configs/database.ini');

        $this->dsn = $this->dbIni['dsn'];
        $this->user = $this->dbIni['user'];
        $this->password = $this->dbIni['password'];

        $this->dbh = new PDO($this->dsn, $this->user, $this->password);
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->dbh = null;
    }

}