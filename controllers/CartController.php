<?php
session_start();
// session_destroy();
// Require các file cần sử dụng.
require_once('core/function.php');

// Các Model cần thiết.
require_once('models/productModel.php');
require_once('models/ProductModel.php');
require_once('models/UserModel.php');
require_once('models/OrderModel.php');
require_once('models/OrderDetailModel.php');
require_once('models/DealModel.php');

// GET action.
$action = "home";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'add':
        if (isset($_POST)) {
            $return = "";
            try {
                $user_id = $_SESSION['user']['id'];
                $status = 0;
                $created = now();
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $order_id = addNewOrder($user_id, $status, $created, $name, $address, $phone, $email);

                foreach ($_SESSION['cart'] as $item) {
                    $order_id = $order_id;
                    $product_id = $item['id'];
                    $size_id =  $item['size'];
                    $quantity =  $item['quantity'];
                    $price = getProductById($product_id)['price'];
                    addNewOrderDetail($order_id, $product_id, $size_id, $quantity, $price);
                }
                unset($_SESSION['cart']);
                $return = array(
                    'status' => 200,
                    'title' => 'Đặt hàng thành công',
                    'message' => 'Đơn hàng đang được xủ lý'
                );
            } catch (Exception $e) {
                $return = array(
                    'status' => 204,
                    'title' => 'Đã xảy ra lỗi',
                    'message' => 'Lỗi: ' . $e->getMessage()
                );
            }
            print_r(json_encode($return));
            die();
        }
        break;
    case 'updateCartAJAX':
        if (isset($_GET['id']) && isset($_GET['quantity']) && isset($_GET['size'])) {
            $quantity = $_GET['quantity'];
            $a = $_SESSION['cart'];
            $productID = $_GET['id'];
            $size = $_GET['size'];

            $search_items = array('id' => $productID, 'size' => $size);
            $result = searchMultiKey($_SESSION['cart'], $search_items);
            $index = $result[0]['index'];

            $_SESSION['cart'][$index]['quantity'] = $quantity;

            $product = getProductById($productID);
            $total = 0;
            foreach ($_SESSION['cart'] as $i) {
                $total += ($i['quantity'] * getProductById($i['id'])['price']);
            }

            echo json_encode([numToMoney($product['price'] * $quantity), numToMoney($total)]);
        }

        // echo json_encode($_SESSION['cart']);
        break;
    case 'deleteItem':
        if (isset($_GET['id']) && isset($_GET['size'])) {
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

                $search_items = array('id' => $_GET['id'], 'size' => $_GET['size']);
                $result = searchMultiKey($_SESSION['cart'], $search_items);
                $index = $result[0]['index'];

                unset($_SESSION['cart'][$index]);
            }

            $total = 0;
            foreach ($_SESSION['cart'] as $i) {
                $total += ($i['quantity'] * getProductById($i['id'])['price']);
            }
            echo json_encode([0, numToMoney($total)]);
        }
        break;
    default:
        if (isset($_SESSION['user'])) {
            $user = getUserById($_SESSION['user']['id']);
        }

        require_once('views/cart/index.php');
        break;
}

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    include '../core/connect.php';
    $query = 'SELECT * FROM product WHERE id = ' . $productId;
    $stmt = $conn->query($query);
    $product = $stmt->fetchAll();
    $product = current($product);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(
            '0' => array(
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'description' => $product['description'],
                'thumb' => $product['thumb'],
                'images' => $product['images'],
                'update' => $product['update'],
                'cost' => $product['cost'],
                'quantity' => 1
            )
        );
    } else {
        $ids = [];
        foreach ($_SESSION['cart'] as $key => $cart) {
            $ids[] = $cart['id'];
            if ($cart['id'] == $productId) {
                $quantity = $cart['quantity'] + 1;
                $_SESSION['cart'][$key]['quantity'] = $quantity;
                break;
            }
        }

        if (!in_array($productId, $ids)) {
            array_push(
                $_SESSION['carts'],
                array(
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'description' => $product['description'],
                    'thumb' => $product['thumb'],
                    'images' => $product['images'],
                    'update' => $product['update'],
                    'cost' => $product['cost'],
                    'quantity' => 1
                )
            );
        }
    }

    header("Location: http://localhost/Pro1014/views/cart/index.php");



    $productId = $_GET['productId'];
    include '../core/connect.php';
    $query = 'SELECT * FROM product WHERE id = ' . $productId;
    $stmt = $conn->query($query);
    $product = $stmt->fetchAll();
    $product = current($product);

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cart) {
            if ($cart['id'] == $productId) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $query = 'INSERT INTO cart ( user_id,product_id ,size_id ,color_id,quantity)
    VALUES ("' . $_POST['user_id'] . '" ,
    "' . $_POST['product_id'] . '",
    "' . $_POST['size_id'] . '",
    "' . $_POST['color_id'] . '",
    "' . $_POST['quantity'] . '"
    )';

    $stmt = $conn->query($query);


    header("Location: http://localhost/Pro1014/views/cart/index.php");
}
