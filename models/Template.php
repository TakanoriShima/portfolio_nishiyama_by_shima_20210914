<?php
    require_once 'models/Model.php';
    require_once 'models/TemplateItem.php';
    
    class Template extends Model{
        public $id; // テンプレートid
        public $name; // テンプレート名
        public $created_at; //登録日時
        
        public function __construct($name=''){
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
                $stmt = $pdo->prepare('SELECT template_items.id, template_items.name, template_items.created_at FROM template_items JOIN template_item_relations ON template_items.id=template_item_relations.template_item_id WHERE template_item_relations.template_id=:template_id ORDER BY template_items.id');
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
    }
