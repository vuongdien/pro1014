<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/function.php');
    require_once('models/DealModel.php');
    
    // Các Model cần thiết.

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            require_once('views/contact/index.php');
            break;
        default: 
            require_once('views/contact/index.php');
            break;
        break;
    }
