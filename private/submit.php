

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>メッセージ登録結果</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="alert alert-info">

<?php
// パスワードの確認
$password = $_POST['password'];
if ($password !== 'kinme') {
    die('パスワードが間違っています。');
}

// メッセージの取得
$message = $_POST['message'];

// メッセージをUTF-8のCRLF形式で保存するために改行コードを変換
$message = str_replace("\n", "\r\n", $message);

// ファイルパス（１つ上の階層に保存）
$file_path = dirname(__DIR__) . '/message.txt';

// ファイルにメッセージを書き込む
file_put_contents($file_path, $message);

// 成功メッセージを表示
echo 'メッセージが正常に保存されました。';
?>

        </h2>
        
    </div>

</body>
</html>
