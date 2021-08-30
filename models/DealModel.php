<?php
require_once 'core/connect.php';

// Lấy tất cả khuyến mãi
function getAllDeal(){
    $sql = "select * from deal";
    return query($sql);
}

// Lấy khuyến mãi theo id
function getDealId($id){
    $sql = "SELECT * FROM deal WHERE id = $id;";
    return queryOne($sql);
}

// Lấy tất cả sản phẩm trong khuyến mãi
function getAllDealDetailById($id){
    $sql = "SELECT * FROM deal_detail WHERE deal_id = $id;";
    return query($sql);
}
?>