<?php
session_start();

// Require các file cần sử dụng.
require_once 'core/function.php';

// Các Model cần thiết.
require_once 'models/UserModel.php';
require_once 'models/OrderModel.php';
require_once 'models/OrderDetailModel.php';
require_once 'models/ProductModel.php';
require_once('models/DealModel.php');


// GET action.
$action = "home";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'home':
        if ($_SESSION['user']['id']) {
            $userId = $_SESSION['user']['id'];
            $user = getUserById($userId);
            $orders = getOrderByUser($userId);
            require_once 'views/user/index.php';
        } else {
            header('location: index.php');
        }

        break;
    
    case 'detail':
        if ($_SESSION['user']['id']) {
            $id = $_GET['id'];
            $order = getOrderById($id);
            $orderItems = getAllProductByOrderId($id);
            require_once('views/user/order-detail.php');
        } else {
            header('location: index.php');
        }

        break;
    case 'updateStatus':
        if ($_SESSION['user']['id']) {
            $id = $_GET['id'];
            $status = $_GET['status'];
            updateStatus($id, $status);
            header("location:user.php");
        } else {
            header('location: index.php');
        }
        
        break;
    default:
        if ($_SESSION['user']['id']) {
            $allUser = getAllUser();
            require_once 'views/user/index.php';
        } else {
            header('location: index.php');
        }
        break;
        break;
}
