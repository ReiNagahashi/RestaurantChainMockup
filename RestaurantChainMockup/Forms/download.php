<?php
namespace Forms;

use Helpers\RandomGenerator;

// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once '../vendor/autoload.php';
require_once '../Interfaces/FileConvertible.php';
require_once '../Models/User.php';
require_once '../Helpers/RandomGenerator.php';

// POSTリクエストからパラメータを取得→一般的には$_POSTで入力は取ってくる
$count = $_POST['count'] ?? 5;
$format = $_POST['format'] ?? 'html';

// →PHP には、HTTP リクエストからデータを取得するいくつかの方法があります。
// 最も一般的なのは $_POST 変数を使用する方法
// →より低レベルでリクエストを扱いたい場合、file_get_contents 関数を使うことができます。
// →これは特定のユースケースで役立ちます。
// ex: デバッグ時に送信データを確認したい場合や、非標準のコンテンツタイプでリクエストを処理したい場合などに使用することができます。

// 型エラーは嫌なのでパラメータをintにキャスト
$count = (int)$count;

// クライアントから受け取ったデータを処理の前に検証することが重要
if(is_null($count) || is_null($format)){
    exit('Missing parameters.');
}

if(!is_numeric($count) || $count < 1 || $count > 100){
    exit('Invalid count. Must be a number between 1 and 100.');
}

$allowedFormats = ['txt', 'json', 'md', 'html'];

if(!in_array($format, $allowedFormats)){
    exit('Inavlid type. Must be one of: '. implode(', ', $allowedFormats));
}

// ユーザーを生成
$users = RandomGenerator::users($count);

if ($format === 'md') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($users as $user) {
        echo $user->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="users.json"');
    $usersArray = array_map(fn($user) => $user->toArray(), $users);
    echo json_encode($usersArray);
} elseif ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    foreach ($users as $user) {
        echo $user->toString();
    }
} else {
    // HTMLをデフォルトに
    header('Content-Type: text/html');
    foreach ($users as $user) {
        echo $user->toHTML();
    }
}