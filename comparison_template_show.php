<?php

    require_once 'models/ComparisonItem.php';
    require_once 'models/ComparisonTemplate.php';
    require_once 'models/Product.php';
    $template_id = $_GET['id'];
    
    $template = ComparisonTemplate::find($template_id);
    // var_dump($template);
    
    $products = Product::find_products_by_comparison_template_id($template_id);
    // var_dump($products);
    
    $items = ComparisonItem::find_items_by_template_id($template_id);
    
    // var_dump($items);
    
    include_once 'views/comparison_template_show_view.php';