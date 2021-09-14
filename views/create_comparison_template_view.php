<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規比較テンプレート作成</title>
    </head>
    <body>
        <h1>新規比較テンプレート作成</h1>
        
        <form action="comparison_template_create.php">
            <select name="template_id">
            <?php foreach($templates as $template): ?>
                <option value="<?= $template->id ?>" <?= $template_id === $template->id ? 'selected' : '' ?>><?= $template->name ?></option>
            <?php endforeach; ?>
            </select>
            <button type="submit">選択</button>
        </form>
        <form action="comparison_template_store.php" method="POST">
            新規比較テンプレート名: <input type="text" name="template_name">
            <table border="1">
                <tr>
                    <th>項目連番</th>
                    <th>テンプレートアイテム名</th>
                    <th>削除</th>
                </tr>
                
                <?php foreach($template_items as $index => $item): ?>
                <tr id="tr<?= $index + 1 ?>">
                    <td><?= $index + 1 ?></td>
                    <td><?= $item->name ?></td>
                    <td>
                        <input type="hidden" name="items[]" value="<?= $item->name ?>">
                        <button id="button<?= $index + 1 ?>" name="delete">削除</button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">
                        <button type="submit">登録</button>
                    </td>
                </tr>
            </table>
        </form>

        <button id="add">アイテム追加</button><br>
        
        <p><a href="index.php">比較テンプレート一覧へ戻る</a></p>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script>
            /* global $*/
            $(function(){
                
                $('#button5').on('click', function(){
                   alert('button'); 
                });
                
                $('button[name="delete"]').on('click', function(){
                    // alert('ok');
                    // console.log($(this));
                    const id = ($(this).prop('id')).replace('button', '');
                    // console.log(id);
                    $('#tr' + id).remove();
                });
                
                $('#add').on('click', function(){
                    const count = $('tr').length - 1;
                    const input = $('<input>', {name: 'items[]'});
                    const tr = $('<tr>', {id: 'tr' + count});
                    const td1 = $('<td>', {text: count});
                    const td2 = $('<td>');
                    const td3 = $('<td>');
                    const button = $('<button>', {text: '削除', id: 'button' + count, name: 'delete'});
                    td2.append(input);
                    td3.append(button);
                    tr.append(td1);
                    tr.append(td2);
                    tr.append(td3);
                    $('tr:nth-child(' + count + ')').after(tr);
                });
            });
        </script>
    </body>
</html>