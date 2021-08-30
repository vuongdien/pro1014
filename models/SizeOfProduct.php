<?php

require_once 'core/connect.php';

function getSizeByProductId($id){
    $sql = "SELECT * FROM product_detail WHERE product_id = $id  order BY size_id";
    return query($sql);
}


function getMinMaxSizeOfProduct($id){
    $sql = "SELECT min(size_id) as min, max(size_id) as max FROM product_detail WHERE product_id = $id";
    return queryOne($sql);
}