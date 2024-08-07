<?php
namespace Forms;
?>
<!-- ユーザーが生成したい User インスタンスの数と希望する出力形式（HTML、Markdown、JSON、またはテキスト）
を指定できる HTML フォームを作成します。このフォームは、generate.php という名前のファイルに含まれ
POST リクエストをdownload.php に送信します。 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Users</title>
</head>
<body>
    <!-- フォーム入力先をactionで指定している！
    あとは指定先で例えば入力を受け取るために$_POSTを使ったりする -->
    <form action="download.php" method="post">
        <label for="count">Number of Users:</label>
        <input type="number" id="count" name="count" min="1" max="100" value="5">
        
        <label for="format">Download Format:</label>
        <select id="format" name="format">
            <option value="html">HTML</option>
            <option value="md">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
        </select>

        <button type="submit">Generate</button>
    </form>
</body>
</html>