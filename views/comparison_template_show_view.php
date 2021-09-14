<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>比較商品追加</title>
    </head>
    <body>
        <h1>比較商品追加</h1>
        <h2>比較テンプレート名: <?= $template->name ?></h2>
        <form action="product_store.php" method="POST">
            <input type="hidden" name="comparison_template_id" value="<?= $template_id ?>">
            <table border="1">
                <tr>
                    <th>項目番号</th>
                    <th>項目名</th>
                    <th>製品名<input type="text" name="name"></th>
                </tr>
                <?php foreach($items as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->name ?></td>
                    <td>
                        <!--<input type="hidden" name="comparison_item_id" value="<?= $item->id ?>">-->
                        <input type="text" name="name<?= $item->id ?>">
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button type="submit">追加</button></td>
                </tr>
            </table>
        </form>
        
        <h2>比較商品一覧</h2>
        <table border="1">
            <tr>
                <th>製品名</th>
                <?php foreach($items as $item): ?>
                <th><?= $item->id ?>: <?= $item->name ?></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach($products as $product): ?>
            <tr>
                <th><?= $product->name ?></th>
                <?php foreach($product->item_values() as $item): ?>
                <td><?= $item->value ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <p><a href="index.php">比較テンプレート一覧へ</a></p>
    </body>
</html>