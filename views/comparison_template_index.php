<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>比較テンプレート一覧</title>
    </head>
    <body>
        <h1>比較テンプレート一覧</h1>
        
        <table border="1">
            <tr>
                <th>比較テンプレート番号</th>
                <th>比較テンプレート名</th>
                <th>現在の登録商品数</th>
            </tr>
            <?php foreach($comparison_templates as $comparison_template): ?>
            <tr>
                <td><a href="comparison_template_show.php?id=<?= $comparison_template->id ?>"><?= $comparison_template->id ?></a></td>
                <td><?= $comparison_template->name ?></td>
                <td><?= count($comparison_template->products())?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        
        <p><a href="comparison_template_create.php">比較商品登録へ</a></p>
    </body>
</html>