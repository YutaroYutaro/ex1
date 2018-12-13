<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 17:35
 */

class Validation
{
    public function MaxSize($str, $size) {
        return (mb_strlen($str, 'UTF-8') > $size) ? false : true;
    }
}