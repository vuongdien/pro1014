<?php
require_once 'core/connect.php';

// Lấy thẻ sản phẩm theo id
function getTagId($id){
    $sql = "SELECT * FROM tag_product WHERE id = $id;";
    return queryOne($sql);
}

// Lấy tất cả thẻ sản phẩm
function getAllTag(){
    $sql = "select * from tag_product";
    return query($sql);
}

// Cập nhật thẻ sản phẩm
function updateTagProduct($id,$anhien,$name){
    $sql = 'UPDATE `tag_product` SET `id`='.$id.',`name`="'.$name.'",`show`='.$anhien.' WHERE id ='.$id.'';
    execute($sql);
}

// Thêm thẻ sản phẩm
function addNewTagProduct($anhien,$name){
    $sql = 'INSERT INTO `tag_product`(`name`, `show`) VALUES ("'.$name.'",'.$anhien.')';
    execute($sql);
}

// Xoá thẻ sản phẩm
function deleteTagProduct($id){
    $sql = 'DELETE FROM `tag_product` WHERE id ='.$id.'';
    execute($sql);
}

// Lấy thông tin thẻ sản phẩm từ id product
function getNameTagByIdProduct($id){
    $sql = 'SELECT * from `tag_product` inner join tag_of_product on tag_of_product.tag_id = tag_product.id WHERE tag_of_product.product_id ='.$id.'';
    return queryOne($sql);
}
?>