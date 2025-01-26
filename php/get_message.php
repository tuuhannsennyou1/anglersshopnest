<?php
// ファイルのパス
$file_path = '../message.txt';

// ファイルが存在するか確認
if (file_exists($file_path)) {
    // ファイルの内容を読み込む
    $file_content = file_get_contents($file_path);
    
    // 内容をJSON形式に変換
    $json_content = trim(json_encode(['message' => $file_content], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    // JSONを出力
    header('Content-Type: application/json');
    echo $json_content;
} else {
    // エラーメッセージをJSON形式で返す
    $error_message = json_encode(['message' => 'File not found.'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // JSONを出力
    header('Content-Type: application/json');
    echo $error_message;
}
?>
