<?php
require_once 'core/connect.php';

// Lấy tất cả đánh giá của sản phẩm
function getReviewsByProductId($id){
    $sql = "SELECT * FROM review WHERE product_id = $id;";
    return query($sql);
}

//Lấy tất cả đánh giá
function getAllReviewProduct(){
    $sql = "SELECT * FROM review";
    return query($sql);
}
function getAllReviews(){
    $sql = "SELECT * FROM review order by id";
    return query($sql);
}
function getReviewById($id){
    $sql = "SELECT * FROM review WHERE id = $id;";
    return queryOne($sql);
}

//Lấy tất cả đánh giá và tên người dùng
function getAllReviews_NameUser(){
    $sql = "SELECT *,user.username FROM review inner join user on user.id = review.user_id";
    return query($sql);
}

// Lấy tất cả đánh giá của một khách hàng
function getReviewsByUserId($id){
    $sql = "SELECT * FROM review WHERE user_id = $id;";
    return query($sql);
}
function addNewReviewsOfProduct($product_id,$user_id,$message,$star){
$sql = "INSERT INTO `review`( `product_id`, `user_id`, `review`,`rate`,`anhien`) VALUES ('$product_id', '$user_id','$message','$star','3')";
    return execute($sql);
}

function deleteReviewProduct($id){
    $sql = "DELETE FROM review WHERE id=$id";
    execute($sql);
}
function updateReviewProduct($id,$com){
    $sql = "UPDATE review SET anhien = '$com' where id = '$id'";
    return execute($sql);
};


