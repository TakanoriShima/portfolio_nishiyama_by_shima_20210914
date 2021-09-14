<?php
    require_once 'models/Model.php';
    require_once 'models/TemplateItem.php';
    require_once 'models/ProductItemValue.php';
    
    class Product extends Model{
        public $id; // 商品id
        public $comparison_template_id; // 比較テンプレート番号
        public $name; // 商品名
        public $created_at; //登録日時
        
        public function __construct($comparison_template_id='', $name=''){
            $this->comparison_template_id = $comparison_template_id;
            $this->name = $name;
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
                    $stmt = $pdo -> prepare("INSERT INTO products (comparison_template_id, name) VALUES (:comparison_template_id, :name)");
                    // バインド処理
                    $stmt->bindValue(':comparison_template_id', $this->comparison_template_id, PDO::PARAM_INT);
                    $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
                    // 実行
                    $stmt->execute();
                    
                    $id = $pdo->lastInsertId('id');
                    
                    self::close_connection($pdo, $stmp);
                    
                    return $id;
                
                    
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
        
        public static function find_products_by_comparison_template_id($template_id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM products WHERE comparison_template_id=:comparison_template_id');
                // バインド処理
                $stmt->bindValue(':comparison_template_id', $template_id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、Productクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Product');
                $products = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                // Productクラスのインスタンスを返す
                return $products;
            } catch (PDOException $e) {
                return null;
            }
        }
        
        public function item_values(){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM product_item_values WHERE product_id=:product_id');
                // バインド処理
                $stmt->bindValue(':product_id', $this->id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、ProductItemValueクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductItemValue');
                $values = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                // ProductItemValueクラスのインスタンスを返す
                return $values;
            } catch (PDOException $e) {
                return null;
            }
        }
    }
