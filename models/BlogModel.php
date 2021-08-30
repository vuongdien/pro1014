<?php

require_once 'core/connect.php';

function countAllBLog(){
    $sql = "SELECT count(*) as count FROM blog";
    return queryOne($sql)['count'];
}
function getMaxBlogId(){
    $sql = "SELECT MAX(id) as max FROM blog";
    return queryOne($sql)['max'];
}
function getAllBlogCatalog(){
    $sql = "select * from tag_blog";
    return query($sql);
}
function getAllBlog(){
    $sql = "select * from blog order BY created desc";
    return query($sql);
}
function getAllBlogComment(){
    $sql = "SELECT * FROM blog_comment ORDER BY created";
    return query($sql);
}
function getBlogCommentByBlogId($blogid){
    $sql = "SELECT * FROM blog_comment WHERE blog_id = $blogid";
    return query($sql);
}
function getBlogCommentById($id){
    $sql = "SELECT * FROM blog_comment WHERE id = $id";
    return queryOne($sql);
}
function deleteBlogComment($id){
    $sql = "DELETE FROM blog_comment WHERE id=$id";
    return execute($sql);
}
function updateCommentBlog($id,$com){
    $sql = "UPDATE blog_comment SET content = '$com' where id = '$id'";
    return execute($sql);
};
function getBlogByOffset($limit, $offset){
    $sql = "SELECT * FROM blog order BY created desc LIMIT $limit OFFSET $offset;";
    return query($sql);
}

function getBlogById($id){
    $sql = "select * from blog where id=".$id;
    return queryOne($sql);
}
function getCountBlog(){
    $sql = "SELECT (COUNT(*)/3) as `countb` from `blog`";
    return queryOne($sql);
}
function setComment($idblog,$user,$message,$created){
    $sql = "INSERT INTO `blog_comment`( `blog_id`, `user_id`, `content`, `created`) VALUES ('$idblog','$user','$message','$created')";
    return execute($sql);
}
function getComment(){
    $sql = "SELECT * from comment";
    return queryOne($sql);
    
}
function addNewBlog($userId,$title,$thumb,$now,$description,$content){
    $sql = "INSERT INTO `pro1014`.`blog` (`user_id`, `title`,`thumb`, `created`, `description`, `content`, `view`, `show`) VALUES ('$userId', '$title','$thumb', '$now', '$description', '$content', '0', b'1');";
    return execute($sql);
}

function updateBlog($blogid,$title,$description,$thumb,$content){
    $sql = "UPDATE blog SET title = '$title', thumb = '$thumb', `description` = '$description' , content = '$content' where id ='$blogid'";
    return execute($sql);
}

function deleteBlog($id){
    $sql = "DELETE FROM blog WHERE id=$id";
    return execute($sql);
}
?>