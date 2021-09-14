<?php

    require_once 'models/Product.php';
    require_once 'models/ProductItemValue.php';

    // var_dump($_POST);
    $comparison_template_id = $_POST['comparison_template_id'];
    $name = $_POST['name'];
    
    $product  = new Product($comparison_template_id, $name);
    // var_dump($product);
    $product_id = $product->save();
    // $product_id = 1;
    
    $values = array();
    
    // 各項目登録
    foreach($_POST as $key => $value){
        $key = str_replace("name", "", $key);
        if(preg_match('/^[0-9]+$/', $key)){
            $value = new ProductItemValue($product_id, $key, $value);
            $value->save();
        }
    }
    
    header('Location: comparison_template_show.php?id=' . $comparison_template_id);
    exit;