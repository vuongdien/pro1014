<?php

require_once 'core/connect.php';

// Lấy tất cả size
function getAllSize(){
    $sql = "SELECT * FROM size";
    return query($sql);
}

// Lấy size theo id
function getSizeId($id){
    $sql = "SELECT * FROM size WHERE id = $id;";
    return queryOne($sql);
}

// Thêm màu sắc
function addNewSize($size){
    $sql = 'INSERT INTO `size`(`id`, `size`) VALUES ('.$size.','.$size.')';
    execute($sql);
}

// Xoá màu sắc
function deleteSize($id){
    $sql = 'DELETE FROM `size` WHERE id ='.$id.'';
    execute($sql);
}

// Cập nhật thẻ sản phẩm
function updateSize($size,$id){
    $sql = 'UPDATE `size` SET `id`='.$size.',`size`='.$size.' WHERE id ='.$id.'';
    execute($sql);
}