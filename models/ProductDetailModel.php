<?php
require_once 'core/connect.php';

// Lấy ra thông tin của sản phẩm
function getProductDetailById($id){
    $sql = "SELECT product_id,quantity,size_id FROM product_detail WHERE product_id = $id";
    return query($sql);
}

// Lấy ra size của sản phẩm
function getSizeOfProduct($productId){
    $sql = "SELECT size_id FROM product_detail WHERE product_id = $productId order by size_id";
    return query($sql);
}

// Thêm chi tiết của sản phẩm
function addNewProductDetail($productId,$size,$quantity){
    $sql = 'INSERT INTO product_detail(`product_id`, `size_id`, `quantity`) VALUES ('.$productId.','.$size.','.$quantity.')';
    execute($sql);
}

// Cập nhật số lượng của sản phẩm
function updateProductDetail($productId,$size,$quantity){
    $sql = "UPATE product_detail set `quantity`= $quantity where `product_id`=$productId, `size_id`=$size";
    execute($sql);
}

function  deleteProductDetailById($id){
    $sql = "DELETE FROM `product_detail` WHERE product_id = $id";
    execute($sql);
}

?>
