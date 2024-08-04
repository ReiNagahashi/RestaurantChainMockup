<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

// ユーザーの生成
$users = RandomGenerator::users(10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <style>
        /* ユーザーカードのスタイル */
    </style>
</head>
<body>
    <h1>User Profiles</h1>

    <?php foreach ($users as $user): ?>
    <div class="user-card">
        <!-- ユーザー情報の表示 -->
        <?php echo $user->toHTML(); ?>
    </div>
    <?php endforeach; ?>

</body>
</html>