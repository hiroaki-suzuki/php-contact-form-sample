<?php
session_start();

// セッションに保存しておいた、エラーメッセージと入力情報を取得する
// これらの値は、この画面で入力をして確認画面に遷移した際に、
// その中（confirm.php）で、入力チェックを行っており、入力の誤りがあった場合に、
// セッションにエラーメッセージ、入力値をセットして、入力画面にリダイレクトしているので、取れる値になる。
$errors = $_SESSION['errors'];
unset($_SESSION['errors']);

$name = $_SESSION['name'];
unset($_SESSION['name']);

$email = $_SESSION['email'];
unset($_SESSION['email']);

$content = $_SESSION['content'];
unset($_SESSION['content']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="contact">
            <h1>Contact</h1>

            <form action="/confirm.php" method="post">
                <!-- お名前 -->
                <div class="contact__name">
                    <input type="text" name="name" class="contact__name-form" placeholder="お名前"
                           value="<?php echo htmlspecialchars($name); ?>">

                    <?php if (!empty($errors['name'])): ?>
                        <?php foreach ($errors['name'] as $error): ?>
                            <p class="contact__error"><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>

                <!-- メールアドレス -->
                <div class="contact__email">
                    <input type="text" name="email" class="contact__email-form" placeholder="メールアドレス"
                           value="<?php echo htmlspecialchars($email); ?>">

                    <?php if (!empty($errors['email'])): ?>
                        <?php foreach ($errors['email'] as $error): ?>
                            <p class="contact__error"><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>

                <!-- お問い合わせ内容 -->
                <div class="contact__content">
                <textarea name="content" class="content" rows="5" cols="100" class="contact__content-form"
                          placeholder="お問い合わせ内容"><?php echo htmlspecialchars($content); ?></textarea>

                    <?php if (!empty($errors['content'])): ?>
                        <?php foreach ($errors['content'] as $error): ?>
                            <p class="contact__error"><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>

                <div class="contact__action-btn">
                    <button type="submit">お問い合わせ確認画面へ</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
