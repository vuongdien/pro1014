<?php

require_once 'core/connect.php';

// Lấy tất cả thẻ tin tức
function getAllTagBlog(){
    $sql = "select * from tag_blog";
    return query($sql);
}

// Lấy thẻ tin tức theo id
function getTagBlogById($id){
    $sql = "select * from tag_blog where id = $id";
    return queryOne($sql);
}

// Thêm thẻ tin tức
function addNewTagBlog($tagname,$priority){
    $sql = "INSERT INTO `pro1014`.`tag_blog` (`name`, `show`,`priority`) VALUES ('$tagname', b'1','$priority')";
    return execute($sql);
}

// Xoá thẻ tin tức
function deleteTagBlog($id){
    $sql = "DELETE FROM tag_blog WHERE id=$id";
    return execute($sql);
}

// Cập nhật thẻ tin tức
function updateTagBlog($id,$tagname,$priority){
    $sql = "UPDATE tag_blog SET `name` = '$tagname', priority = '$priority' where id ='$id'";
    return execute($sql);
}
