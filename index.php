<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-10
 * Time: 14:54
 */

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>掲示板</title>
</head>
<body>
<div class="container mt-4">
    <div class="row">

        <!--    入力フォーム    -->
        <div class="col-4">
            <form action="" method="post">
                <label>タイトル</label>
                <input type="text" class="form-control" id="title" name="title">
                <label>内容</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="内容"></textarea>
                <button type="submit" class="btn btn-info">投稿する</button>
            </form>
        </div>

        <!--    投稿一覧    -->
        <div class="col-8">
            <div class="card mb-3">
                <div id="1" class="card-body">
                    <h5 class="card-title">タイトル</h5>
                    <p class="card-text card-comment">投稿コメント</p>
                    <p class="card-text">
                        <small class="text-muted">2018/12/10</small>
                    </p>
                    <button type="button" class="btn btn-success updateButton" data-toggle="modal"
                            data-target="#updateModal">修正する
                    </button>
                    <button type="button" class="btn btn-danger deleteButton" data-toggle="modal"
                            data-target="#deleteModal">削除する
                    </button>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">修正</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <label>タイトル</label>
                            <input type="text" class="form-control" id="update-title" name="update-title">
                            <label>内容</label>
                            <textarea class="form-control" id="update-comment" name="update-comment"
                                      placeholder="内容"></textarea>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">削除確認</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        本当に削除しますか？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-danger">削除する</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="./app/js/function.js"></script>
</body>
</html>
