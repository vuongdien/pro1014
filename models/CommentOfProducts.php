<?php

require_once 'core/connect.php';

// Lấy tất cả bình luận sản phẩm
function getAllCommentProduct(){
    $sql = "SELECT * FROM product_comment";
    return query($sql);
}

// Lấy tất cả bình luận của một user
function getCommentByUserId($id){
    $sql = "SELECT * FROM product_comment WHERE user_id = $id;";
    return query($sql);
}

// Lấy tất cả bình luận của sản phẩm
function getCommentByProductId($id){
    $sql = "SELECT * FROM product_comment WHERE product_id = $id;";
    return query($sql);
}

// Lấy bình luận theo id
function getCommentById($id){
    $sql = "SELECT * FROM product_comment WHERE id = $id;";
    return queryOne($sql);
}

// xóa bình luận theo id
function DeleteCommentProductById($id){
    $sql = "DELETE FROM product_comment WHERE id = $id";
    execute($sql);
}

function addNewCommentOfProduct($product_id,$user_id,$message,$created){
    $sql = "INSERT INTO `product_comment`( `product_id`, `user_id`, `content`,`created`, `anhien`) VALUES ('$product_id', '$user_id','$message','$created','3')";
        return execute($sql);
    }
function deleteProductComment($id){
        $sql = "DELETE FROM product_comment WHERE id=$id";
        return execute($sql);
}
function updateCommentProduct($id,$com){
    $sql = "UPDATE product_comment SET anhien = '$com' where id = '$id'";
    return execute($sql);
};
?>
