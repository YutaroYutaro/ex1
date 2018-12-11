<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-11
 * Time: 17:46
 */

include __DIR__ . '/Validation.php';

class BbsValidation extends Validation
{
    public function IdValidation()
    {

    }

    public function TitleValidation($str)
    {
        $errors = [];

        if ($this->MaxSize($str, 256)) $errors[] = 'タイトルが長すぎます．';

        return $errors;
    }

    public function CommentValidation($str)
    {
        $errors = [];

        if ($this->MaxSize($str, 256)) $errors[] = 'コメントが長すぎます．';

        return $errors;
    }
}