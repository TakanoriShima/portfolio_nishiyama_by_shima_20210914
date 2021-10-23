<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規比較テンプレート作成</title>
        <style>
            #table {
                display: flex;
                justify-content: space-around;
            }
            table {
                width: 80%;
            }
            #add {
                width: 15%;
            }
        </style>
    </head>
    <body>
        <h1>新規比較テンプレート作成</h1>
        
        <label>ひな形テンプレート選択</label>: 
        <select name="template_id">
            <option value="未選択">テンプレートを選択</option>
        <?php foreach($templates as $template): ?>
            <option value="<?= $template->id ?>" <?= $template_id === $template->id ? 'selected' : '' ?>><?= $template->name ?></option>
        <?php endforeach; ?>
        </select>

        <br><br><br>
        <div id="table">
            
            <form action="comparison_template_store.php" method="POST">
                新規比較テンプレート名: <input type="text" name="template_name"><br><br>
                <table border="1">
                    <tr id="tr_header">
                        <th>テンプレートアイテム名</th>
                        <th>削除</th>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="submit">登録</button>
                        </td>
                    </tr>
                </table>
            </form>
    
            <button id="add">アイテム追加</button><br>
            
        </div>
        <p><a href="index.php">比較テンプレート一覧へ戻る</a></p>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            /* global $*/
            $(function(){
                
                // ひな形テンプレートを選択した時
                $('select').change(function(){
                    
                    // 一旦表示されているアイテム一覧をクリア 
                    $('[id^="item_id_"]').remove();
                    
                    // ひな形テンプレート番号を取得
                    let template_id = $('[name=template_id]').val();

                    // ひな形テンプレートが選択された時
                    if(template_id !== '未選択'){

                        // 非同期通信でそのひな形テンプレートに紐づくitem一覧を表示
                        $.ajax({
                            type: "POST",
                            url: "get_template_items.php",
                            data: {"template_id" : template_id},
                            dataType : "json"
                         }).done(function(data){ // 非同期通信に成功したら

                            // jsonデータからitem一覧を取得
                            let items = data['items'];

                            // アイテム一覧表示のための繰り返し処理
                            $.each(items, (index, item) => {

                                let tr = $('<tr id="item_id_' + (index + 1) + '">');
                                
                                let td_name = $('<td>', {text: item['name']});
                                td_name.append($('<input>', {type: 'hidden', name: 'items[]', value: item['name']}));
                                tr.append(td_name);
                                
                                let td_delete = $('<td>');
                                td_delete.append($('<button>', {text: '削除', id: (index + 1), name: 'delete'}));
                                tr.append(td_delete);
                                
                                if(index === 0){
                                    $('#tr_header').after(tr);
                                }else{
                                    $('#item_id_' + index).after(tr);
                                }

                            });
                            
                            // 非同期通信のあと、削除ボタンを認識
                            $('button').on('click', function(){
                                const id = ($(this).prop('id'));
                                $('#item_id_' + id).remove();
                            });
                            
                         }).fail(function(XMLHttpRequest, status, e){
                            alert(e);
                         });
                    }
                });

                // アイテム追加ボタンが押された時
                $('#add').on('click', function(){
                    // 表示されているアイテムのカウント数を取得
                    const count = $('[id^="item_id_"]').length;
                    
                    const tr = $('<tr>', {id: 'item_id_' + count});
            
                    const td_name = $('<td>');
                    td_name.append($('<input>', {name: 'items[]'}));
            
                    const td_delete = $('<td>');
                    td_delete.append($('<button>', {text: '削除', id: count, name: 'delete'}));
            
                    tr.append(td_name);
                    tr.append(td_delete);
                    
                    // 表示されている最後のアイテムの次に新しいアイテムを入力する箱を表示
                    $('tr:nth-child(' + (count + 1 ) + ')').after(tr);
                    
                    // 削除ボタンを押した処理の認識
                    $('button').on('click', function(){
                        const id = ($(this).prop('id'));
                        $('#item_id_' + id).remove();
                    });
                });
            });
            
        </script>
    </body>
</html>