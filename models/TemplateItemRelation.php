<?php
    require_once 'models/Model.php';
    
    class TemplateItemRelation {
        public $id; // id
        public $template_id; // テンプレートid
        public $template_item_id; // テンプレートアイテムid
        public $created_at; //登録日時
        
        public function __construct($template_id='', $template_item_id=''){
            $this->template_id = $template_id;
            $this->template_id = $template_item_id;
        }
    }
