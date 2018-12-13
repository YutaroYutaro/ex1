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
    public function IdValidation($id)
    {
        $errors = [];

        return $errors;
    }

    public function TitleValidation($title)
    {
        $errors = [];

        if ($this->MaxSize($title, 50)) $errors['title_length'] = 'タイトルは50文字以内で入力してください．';
        if ($this->Required($title)) $errors['title_required'] = 'タイトルを入力してください．';

        return $errors;
    }

    public function CommentValidation($comment)
    {
        $errors = [];

        if ($this->MaxSize($comment, 100)) $errors['comment_length'] = 'コメントは100文字以内で入力してください．';
        if ($this->Required($comment)) $errors['comment_required'] = 'コメントを入力してください．';

        return $errors;
    }
}
