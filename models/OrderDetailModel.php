<?php
require_once 'core/connect.php';

// Thêm sản phẩm vào order_detail
function getAllProductByOrderId($order_id){
    $sql = "SELECT * FROM `order_detail` WHERE `order_id` = $order_id";
    return query($sql);
}

// Thêm sản phẩm vào order_detail
function addNewOrderDetail($order_id, $product_id, $size_id, $quantity, $price){
    $sql = "INSERT INTO `order_detail` (`order_id`, `product_id`, `size_id`, `quantity`, `price`) VALUES ('$order_id', '$product_id', '$size_id', '$quantity', '$price');";
    return execute($sql);
}

// Tính tổng tiền cửa đơn hàng
function totalPriceOfOrder($order_id){
    $sql = "SELECT SUM(quantity * price) AS total FROM order_detail WHERE order_id = $order_id;";
    return queryOne($sql);
}
?>