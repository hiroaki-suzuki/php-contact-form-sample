<?php
session_start();

$name = $_SESSION['name'];
unset($_SESSION['name']);

$email = $_SESSION['email'];
unset($_SESSION['email']);

$content = $_SESSION['content'];
unset($_SESSION['content']);

// メール送信など
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>完了 | お問い合わせフォーム</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="contact">
            <h1>Contact</h1>
            <div>
                <p>サイト管理者にお問い合わせのメールを送信しました。</p>
                <a href="/">ホームへ</a>
            </div>
        </div>
    </div>
</body>
</html>

