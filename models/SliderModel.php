<?php

require_once 'core/connect.php';

function getAllSlider(){
    $sql = "select * from slider order BY slider.`priority` asc";
    return query($sql);
}
function getSliderByOffset($limit, $offset){
    $sql = "SELECT * FROM product LIMIT $limit OFFSET $offset;";
    return query($sql);
}
