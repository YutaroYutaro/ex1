<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-13
 * Time: 18:52
 */

session_start();
session_destroy();

header( "Location: ./../../signIn.php" ) ;