<?php
    
require_once 'core/connect.php';

// Thêm thẻ vào tin tức
function insertTagOfBlog($blogId,$tagId){
    $sql = "INSERT INTO `pro1014`.`tag_of_blog` (`blog_id`, `tag_id`) VALUES ('$blogId','$tagId');";
    return execute($sql);
}

// Lấy tẩt cả thẻ của tin tức
function getTagByBlogId($id){
    $sql = "SELECT * FROM tag_of_blog WHERE blog_id = $id";
    return query($sql);
}

// Cập nhật thẻ của tin tức
function updateTagOfBlog($blogId,$tagId){
    $sql = "UPDATE tag_of_blog SET tag_id = '$tagId' where blog_id = '$blogId' ";
    return execute($sql);
}

?>