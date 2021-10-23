<?php
    require_once 'models/Template.php';

    session_start();
    
    $template_id = $_POST['template_id'];

    $items = Template::items($template_id);
    
    $list = array('items' => $items);
    
    header("Content-type: application/json; charset=UTF-8");
    
    echo json_encode($list);
    exit;
