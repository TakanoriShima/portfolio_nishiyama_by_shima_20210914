<?php
    require_once 'models/Model.php';
    
    class ComparisonItem extends Model{
        public $id; // アイテムid
        public $comparison_template_id; // 比較テンプレートid
        public $name; // アイテム名
        public $created_at; //登録日時
        
        public function __construct($comparison_template_id, $name=''){
            $this->comparison_template_id = $comparison_template_id;
            $this->name = $name;
        }
        
        // 投稿データを1件登録もしくは更新するメソッド
        public function save(){
            try {
                $pdo = self::get_connection();
                // 新規投稿の場合
                if($this->id === null){
                    $stmt = $pdo -> prepare("INSERT INTO comparison_items (comparison_template_id, name) VALUES (:comparison_template_id, :name)");
                    // バインド処理
                    $stmt->bindValue(':comparison_template_id', $this->comparison_template_id, PDO::PARAM_INT);
                    $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
                    // 実行
                    $stmt->execute();
                    
                    self::close_connection($pdo, $stmp);
                    
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
        
        public static function find_items_by_template_id($template_id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM comparison_items WHERE comparison_template_id=:comparison_template_id');
                // バインド処理
                $stmt->bindValue(':comparison_template_id', $template_id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、ComparisonItemクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ComparisonItem');
                $items = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                // ComparisonItemクラスのインスタンスを返す
                return $items;
            } catch (PDOException $e) {
                return null;
            }
        }
        
    }
