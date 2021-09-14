<?php
    require_once 'models/ComparisonTemplate.php';
    require_once 'models/ComparisonItem.php';
    // var_dump($_POST);
    $template_name = $_POST['template_name'];
    // var_dump($template_name);
    
    $template = new ComparisonTemplate($template_name);
    // var_dump($template);
    $template_id = $template->save();
    
    $items = $_POST['items'];
    
    foreach($items as $item){
        $comparison_item = new ComparisonItem($template_id, $item);
        $comparison_item->save();
    }
    
    
    header('Location: index.php');
    exit;
    
    // var_dump($items);