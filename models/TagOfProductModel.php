<?php
require_once 'core/connect.php';

// Lấy ra tất cả thẻ của sản phẩm
function getTagByProductId($id){
    $sql = "SELECT * FROM tag_of_product WHERE product_id = $id;";
    return queryOne($sql);
}

// Cập nhật thẻ của sản phẩm
function updateTagOfProduct($id,$tag){
    $sql = 'UPDATE `tag_of_product` SET `product_id`='.$id.',`tag_id`='.$tag.' WHERE product_id='.$id.'';
    execute($sql);
}

// Thêm thẻ vào sản phẩm
function addNewTagOfProduct($id,$tag){
    $sql = 'INSERT INTO `tag_of_product`(`product_id`, `tag_id`) VALUES ('.$id.','.$tag.')';
    execute($sql);
}

function getAllTagByProductId($id){
    $sql = "SELECT * FROM tag_of_product WHERE product_id = $id;";
    return query($sql);
}