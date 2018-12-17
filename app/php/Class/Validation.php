<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 17:35
 */

class Validation
{
    public function MaxSize($str, $size)
    {
        return (mb_strlen($str, 'UTF-8') > $size);
    }

    public function Required($str)
    {
        return (empty($str));
    }

    public function EmailFormat($str) {
        return !preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9-\._])*@([a-zA-Z0-9])+([a-zA-Z0-9\.])*([a-zA-Z0-9])+\.([a-zA-Z0-9])+$/', $str);
    }
}
