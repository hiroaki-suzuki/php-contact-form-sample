<?php
session_start();

require_once 'ContactValidator.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP', true, 400);
    exit();
}

$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['content'] = $_POST['content'];

$validator = new ContactValidator($_POST);
$errors = $validator->validate();
if (!empty($errors)) {
    header('Location: http://localhost:8080/contact.php');
    $_SESSION['errors'] = $errors;

    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>確認 | お問い合わせフォーム</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="contact">
            <h1>Contact</h1>
            <form action="/complete.php" method="post">
                <div class="contact__name">
                    <p>お名前：<?php echo htmlspecialchars($_POST['name']); ?></p>
                </div>
                <div class="contact__email">
                    <p>メールアドレス：<?php echo htmlspecialchars($_POST['email']); ?></p>
                </div>
                <div class="contact__content">
                    <p>お問い合わせ内容：<br><?php echo nl2br(htmlspecialchars($_POST['content'])); ?></p>
                </div>

                <div class="contact__action-btn">
                    <button type="button" onclick="location.href = '/contact.php'">戻る</button>
                    <button type="submit">送信</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

