<?php

require_once 'core/connect.php';

function getCatalogById($id){
    $sql = "select * from blog_catalog where id_catalog = $id";
    return queryOne($sql);
}

?>