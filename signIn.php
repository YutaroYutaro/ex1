<?php
/**
 * Created by PhpStorm.
 * User: nishikawa.yutaro
 * Date: 2018-12-13
 * Time: 15:51
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ログイン画面</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<div class="card mx-auto" style="width: 400px; margin-top: 50px">
    <div class="card-header">
        <h2>ログイン</h2>
    </div>
    <div class="card-body">
        <div id="SignInErrorAlert" class="alert alert-danger" role="alert" style="display: none;"></div>
        <form id="SignInForm">
            <div class="form-group">
                <label for="InputEmail">メールアドレス</label>
                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                       name="email" placeholder="メールアドレス">
            </div>
            <div class="form-group">
                <label for="InputPassword">パスワード</label>
                <input type="password" class="form-control" id="InputPassword" name="password" placeholder="パスワード">
            </div>

            <button id="SignIn" class="btn btn-lg btn-primary btn-block" type="button">Sign in</button>
            <button class="btn btn-lg btn-secondary btn-block" type="button" onclick="location.href='signUp.php'">Sign up</button>
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
<script src="app/js/signInFunction.js"></script>
</body>
</html>
