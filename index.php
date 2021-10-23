<?php
    
    require_once 'models/ComparisonTemplate.php';
    require_once 'models/Product.php';
    
    $comparison_templates = ComparisonTemplate::all();
    
    // $c = new ComparisonTemplate();
    // $c->all();
    
    // var_dump($comparison_templates);
    // foreach($comparison_templates as $value){
    //     // var_dump($value);
    //     $products = $value->products();
    //     // var_dump($products);
    // }
    
    include_once 'views/comparison_template_index.php';