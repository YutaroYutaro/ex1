<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-13
 * Time: 16:04
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>新規登録</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div class="card mx-auto" style="width: 400px; margin-top: 50px">
    <div class="card-header">
        <h2>新規登録</h2>
    </div>
    <div class="card-body">
        <div id="SignUpErrorAlert" class="alert alert-danger" role="alert" style="display: none;"></div>
        <form id="SignUpForm">
            <div class="form-group">
                <label for="InputEmail">メールアドレス</label>
                <input type="email" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp"
                       placeholder="メールアドレス">
            </div>
            <div class="form-group">
                <label for="InputPassword">パスワード</label>
                <input type="password" class="form-control" id="InputPassword" name="password" placeholder="パスワード">
            </div>
            <div class="form-group">
                <label for="InputName">表示名</label>
                <input type="text" class="form-control" id="InputName" name="name" placeholder="表示名">
            </div>

            <button id="SignUp" type="button" class="btn btn-primary">登録</button>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="app/js/signUpFunction.js"></script>
</body>
</html>


