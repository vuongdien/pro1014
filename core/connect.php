<?php

// Kết nối tới database
function getConnection(){
    //Khai báo thông tin server
    $host= 'localhost';
    $dbname = 'pro1014';
    $username = 'root';
    $password = '';
    $port ='3306';
    $charset = 'utf8_general_ci';
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    try {
        $conn = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname,$username,$password,$options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conn->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    return $conn;
}


//Gửi câu truy vấn SELECT và trả về tất cả hàng.
function query($sql){
    $connect = getConnection();
    $result = $connect->query($sql)->fetchAll();
    return $result;
}

//Gửi câu truy vấn SELECT và trả về 1 hàng.
function queryOne($sql){
    $connect = getConnection();
    $result = $connect->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//Gửi câu truy vấn thêm xoá sửa và trả về ID vừa tương tác.
function execute($sql){
    $connect = getConnection();
    $result = $connect->exec($sql);
    $id = $connect->lastInsertId();
    return $id;
}
?>