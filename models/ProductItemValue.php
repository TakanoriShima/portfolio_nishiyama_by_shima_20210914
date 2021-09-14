<?php
    require_once 'models/Model.php';
    require_once 'models/TemplateItem.php';
    
    class ProductItemValue extends Model{
        public $id; // 項目id
        public $product_id; // 商品番号
        public $comparison_item_id; // 比較テンプレート番号
        public $value; // 値
        public $created_at; //登録日時
        
        public function __construct($product_id='', $comparison_item_id='', $value=''){
            $this->product_id = $product_id;
            $this->comparison_item_id = $comparison_item_id;
            $this->value = $value;
        }
        
        public static function all(){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->query('SELECT * FROM templates');
                // フェッチの結果を、Templateクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Template');
                $templates = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                // テンプレートクラスの全インスタンスの配列を返す
                return $templates;
            } catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        public static function items($template_id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT template_items.id, template_items.name, template_items.created_at FROM template_items JOIN template_item_relations ON template_items.id=template_item_relations.template_item_id WHERE template_item_relations.template_id=:template_id');
                // バインド処理
                $stmt->bindValue(':template_id', $template_id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、TemplateItemクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'TemplateItem');
                $template_items = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                // TemplateItemクラスのインスタンスを返す
                return $template_items;
            } catch (PDOException $e) {
                return null;
            }
        }
        
        // 投稿データを1件登録もしくは更新するメソッド
        public function save(){
            try {
                $pdo = self::get_connection();
                // 新規投稿の場合
                if($this->id === null){
                    $stmt = $pdo -> prepare("INSERT INTO product_item_values (product_id, comparison_item_id, value) VALUES (:product_id, :comparison_item_id, :value)");
                    // バインド処理
                    $stmt->bindValue(':product_id', $this->product_id, PDO::PARAM_INT);
                    $stmt->bindValue(':comparison_item_id', $this->comparison_item_id, PDO::PARAM_INT);
                    $stmt->bindValue(':value', $this->value, PDO::PARAM_STR);
                    // 実行
                    $stmt->execute();
                    
                    // $id = $pdo->lastInsertId('id');
                    
                    self::close_connection($pdo, $stmp);
                    
                    // return $id;
                
                    
                }else{ // 更新の場合
                    
                    // $stmt = $pdo->prepare('UPDATE messages SET title=:title, body=:body, image=:image WHERE id = :id');
                    // // バインド処理                
                    // $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
                    // $stmt->bindValue(':body', $this->body, PDO::PARAM_STR);
                    // $stmt->bindValue(':image', $this->image, PDO::PARAM_STR);
                    // $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                    // // 実行
                    // $stmt->execute();
                    // self::close_connection($pdo, $stmp);
                    
                    // return 'id: ' . $this->id . 'の投稿情報を更新しました';
                }
                
            } catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
    }
