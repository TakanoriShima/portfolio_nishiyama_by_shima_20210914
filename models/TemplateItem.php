<?php
    require_once 'models/Model.php';
    
    class TemplateItem {
        public $id; // アイテムid
        public $name; // アイテム名
        public $created_at; //登録日時
        
        public function __construct($name=''){
            $this->id = $id;
            $this->name = $name;
        }
        
    }
