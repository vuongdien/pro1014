<?php 

require_once 'core/connect.php';

// Lấy màu theo id
function getColorId($id){
    $sql = "SELECT * FROM color WHERE id = $id;";
    return queryOne($sql);
}

// Lấy tất cả màu
function getAllColor(){
    $sql = "select * from color";
    return query($sql);
}

// Thêm màu sắc
function addNewColor($colorCode,$name){
    $sql = 'INSERT INTO `color`(`name`, `colorCode`) VALUES ("'.$name.'","'.$colorCode.'")';
    execute($sql);
}

// Xoá màu sắc
function deleteColor($id){
    $sql = 'DELETE FROM `color` WHERE id ='.$id.'';
    execute($sql);
}

// Cập nhật thẻ sản phẩm
function updateColor($id,$colorCode,$name){
    $sql = 'UPDATE `color` SET `id`='.$id.',`name`="'.$name.'",`colorCode`="'.$colorCode.'" WHERE id ='.$id.'';
    execute($sql);
}