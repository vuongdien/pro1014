<?php

require_once 'core/connect.php';

// Lấy tất cả đơn hàng
function getAllOrder(){
    $sql = "SELECT * FROM `order` order BY created DESC;";
    return query($sql);
}

// Lấy đơn hàng theo vị trí
function getOrderByOffset($limit, $offset){
    $sql = "SELECT * FROM `order` LIMIT $limit OFFSET $offset;";
    return query($sql);
}

// Lấy đơn hàng theo id
function getOrderById($id){
    $sql = "SELECT * FROM `order` WHERE id = $id;";
    return queryOne($sql);
}

// Lấy các đơn hàng của một khách hàng
function getOrderByUser($userid){
    $sql = "SELECT * FROM `order` WHERE user_id = $userid  order BY created desc;";
    return query($sql);
}

// Thêm đơn hàng
function addNewOrder($user_id, $status, $created, $name, $address, $phone, $email){
    $sql = "INSERT INTO `order` (`user_id`, `status`, `created`, `name`, `address`, `phone`, `email`) VALUES ('$user_id', '$status', '$created', '$name', '$address', '$phone', '$email');";
    return execute($sql);
}

// Xoá đơn hàng
function deleteOrder($id){
    $sql = "DELETE FROM `order` WHERE id = $id";
    return execute($sql);
}

function updateStatus($id, $status){
    $sql = "UPDATE `order` SET `id` = '$id', `status` = '$status' WHERE `id` = '$id'";
    execute($sql);
}
?>