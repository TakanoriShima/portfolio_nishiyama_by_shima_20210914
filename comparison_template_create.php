<?php

    require_once 'models/Template.php';
    require_once 'models/TemplateItem.php';
    
    $templates = Template::all();
    $template_items = array();
    $template_id = '';
    
    if(isset($_GET['template_id'])){
        $template_id = $_GET['template_id'];
        // var_dump($template_id);
        $template_items = Template::items($template_id);
        // var_dump($template_items);
    }

    include_once 'views/create_comparison_template_view.php';