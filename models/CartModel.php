<?php

require_once 'core/connect.php';

// Lấy 
function getAllCart(){
    $sql = "select * from config";
    return query($sql);
}

function getCartByUserId($name){
    $sql = "select * from config where name = '".$name."'";
    return queryOne($sql);
}

function addNewCart($userId, $productId, $sizeId, $colorId, $quantity){
    $sql = "INSERT INTO `cart` (`user_id`, `product_id`, `size_id`, `color_id`, `quantity`) VALUES ($userId, $productId, $sizeId, $colorId, $quantity);";
    return execute($sql);
}

function deleteCartByUserId($id){
    $sql = "";
    return execute($sql);
}