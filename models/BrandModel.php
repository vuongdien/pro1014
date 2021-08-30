<?php 
require_once 'core/connect.php';
function getAllBrand(){
    $sql = "select * from brand";
    return query($sql);
}
function getBrandById($id){
    $sql = "select * from brand where id=$id";
    return queryOne($sql);
}
function addNewBrand($name,$show){
    $sql = "INSERT INTO brand(`name`, `show`) VALUES ('$name',$show)";
    return execute($sql);
}
function deleteBrand($id){
    $sql = "DELETE FROM brand WHERE id=$id";
    return execute($sql);
}
function updateBrand($name,$show,$id){
    $sql = "UPDATE brand SET `name` = '$name', `show` = $show  where id = $id";
    return execute($sql);
}

function getNextPriority(){
    $sql = "SELECT priority + 1 AS next from brand ORDer BY priority DESC LIMIT 1";
    return queryOne($sql);
}
?>