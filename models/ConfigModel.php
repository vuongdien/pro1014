<?php

require_once 'core/connect.php';

function getAllConfig(){
    $sql = "select * from config";
    return query($sql);
}
// Lấy ra cài đặt theo tên
function getConfigByName($name){
    $sql = "select * from config where name = '".$name."'";
    return queryOne($sql);
}
// Chỉnh sửa cài đặt
function updateConfig($name, $data){
    echo $sql = "UPDATE `config` SET `config`='$data' WHERE  `name`='$name';";
    return execute($sql);
}