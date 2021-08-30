<?php
    session_start();
    // session_destroy();
    // Require các file cần sử dụng.
    require_once('core/function.php');
    
    // Các Model cần thiết.
    require_once('models/TagModel.php');
    require_once('models/ColorModel.php');
    require_once('models/SizeModel.php');
    require_once('models/BrandModel.php');
    require_once('models/ProductModel.php');
    require_once('models/ProductDetailModel.php');
    require_once('models/SliderModel.php');
    require_once('models/ConfigModel.php');
    require_once('models/DealModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            // $sliders = getAllSlider();
            // $layouts = json_decode(getConfigByName("shop")['config'])->home;
            require_once('views/shop/index.php');
            break;

        case 'addToCart':
            if(isset($_GET['id']) && isset($_GET['size'])){
                $a = addToCart($_GET['id'], $_GET['size']);
                $quantity = 0;
                foreach ($a as $e)  {
                    $quantity += $e['quantity'];
                }
                echo $quantity;
                return;
            }
            break;
        case 'page':
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                if($name == 1){
                    $name = 'tag'; 
                }else if($name == 2){
                    $name = 'color';
                }else{
                    $name = 'brand';
                }
                $values = $_GET['value'];
                if(!isset($_SESSION['filter'])){
                        $_SESSION['filter'] = array('0' => array('name' => $name, 'value' => $values));
                }else{
                    if(in_array($name,array_column($_SESSION['filter'],'name'))){
                        foreach($_SESSION['filter'] as $key => $v){
                            if($v['name'] == $name){
                                    $_SESSION['filter'][$key]['name'] = $name;
                                    $_SESSION['filter'][$key]['value'] = $values;
                            }
                        }
                    }else{
                            array_push($_SESSION['filter'],array('name' => $name, 'value' => $values));
                    }
                }
            }else if(isset($_GET['start'])){
                if(!empty($_SESSION['show'])){
                    $show = $_SESSION['show']['value'];
                }else{
                    $show = 6;
                }
                $x = $_GET['start'];
                $offset = ($x * $show - $show);
                $limit = $show;
                $value = ceil($offset/$show+1);
                $name = 'page';
                $lan = $_GET['cpage'];
                $_SESSION['page'] = array('name'=>$name,'value'=>$value,'tong'=>$lan);
            }else if(isset($_GET['sort'])){
                $value = $_GET['sort'];
                $name = 'sort';
                $_SESSION['sort'] = array('name'=>$name,'value'=>$value);
            }else if(isset($_GET['lower'])){
                $lower = ceil($_GET['lower']);
                $upper = ceil($_GET['upper']);
                $value = $lower.'-'.$upper;
                $name = 'price';
                $_SESSION['price'] = array('name'=>$name,'value'=>$value,'lower'=>$lower,'upper'=>$upper);
            }else if(isset($_GET['show'])){
                $value = $_GET['show'];
                $name = 'show';
                $_SESSION['show'] = array('name'=>$name,'value'=>$value);
            }else if(isset($_GET['button'])){
                $value = $_GET['button'];
                $lan = $_GET['cpage'];
                if(!empty($_SESSION['show'])){
                    $show = $_SESSION['show']['value'];
                }else{
                    $show = 6;
                }
                if(!empty($_SESSION['page'])){
                    if($value == 'next'){
                        $name = $_SESSION['page']['name'];
                        $x = $_SESSION['page']['value'] + 1;
                        $offset = ($x*$show) - $show;
                        $limit = $show;
                    }else{
                        $name = $_SESSION['page']['name'];
                        $x = $_SESSION['page']['value'] - 1;
                        $offset = ($x*$show) - $show;
                        $limit = $show;
                    }
                $_SESSION['page'] = array('name'=>$name,'value'=>$x,'tong'=>$lan);
                }else{
                    if($value == 'next'){
                        $name = 'page';
                        $x = 1 + 1;
                        $offset = ($x*$show) - $show;
                        $limit = $show;
                    }else{
                        $name = 'page';
                        $x = 1 - 1;
                        $offset = ($x*$show) - $show;
                        $limit = $show;
                    }
                    $_SESSION['page'] = array('name'=>$name,'value'=>$x,'tong'=>$lan);
                }
            }
            if(isset($_GET['page'])){
                unset($_SESSION['page']);
            }

            $where ='';
            $true = 1;
            if(!empty($_SESSION['filter'])){
                $true = 2;
                foreach($_SESSION['filter'] as $filter => $value){
                    if($value['value'] == 'delete'){
                        unset($_SESSION['filter'][$filter]);
                    }else{
                        switch($value['name']){
                            case 'tag':
                                $where .= !empty($where) ? ' and product.id IN(select product.id from product  INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$value['value'].')': 'INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$value['value'].'';
                            break;
    
                            case 'color':
                                $where .= !empty($where) ? ' and product.id IN(select product.id from product where color_id =  '.$value['value'].')': 'INNER JOIN color on color.id = color_id where color_id = '.$value['value'].'';
                            break;
    
                            case 'brand':
                                $where .= !empty($where) ? ' and product.id IN(select product.id from product INNER JOIN brand on brand.id = brand_id where brand_id = '.$value['value'].')': 'INNER JOIN brand on brand.id = brand_id where brand_id ='.$value['value'].'';
                            break;
                        }
                    }
                }
            }
            if(!empty($_SESSION['price'])){
                $true = 2;
                $lower = $_SESSION['price']['lower'];
                $upper = $_SESSION['price']['upper'];
                $where .= !empty($where) ? ' and price BETWEEN '.$lower.' and '.$upper.'': ' where price BETWEEN '.$lower.' and '.$upper.'';
            }
            if(!empty($_SESSION['sort'])){
                $true = 2;
                $value = $_SESSION['sort']['value']; 
                if($value == 1){
                    $where .= '';
                }else if($value == 2){
                    $where .= ' order by `update` desc';
                }else if($value == 3){
                    $where .= ' order by view asc';
                }else if($value == 4){
                    $where .= ' order by price asc';
                }else if($value == 5){
                    $where .= ' order by price desc';
                }
            }
            if(isset($_GET['start']) || isset($_GET['button'])){
                if($true == 2){
                    $where .= ' limit '.$limit.' offset '.$offset.'';
                    $pr = getProductByFilter($where); 
                }else{
                    $pr = getProductByOffset($limit, $offset);
                }
            }else{
                $pr = getProductByFilter($where);
            }
            
            
            $lan = 0;
            $luot =0;
            if(!empty($_SESSION['show'])){
               $show = $_SESSION['show']['value']; 
            }else{
                $show = 6;
            }
            $sp = '';
            foreach($pr as $p){  
                $luot++;
                $lan++;
                if($luot <= $show){
                    $sp .= '
                        <div class="col-lg-4 col-md-6">
                            <div class="boxa single-product">
                                <img class="img-fluid" src="'.$p['thumb'].'" alt="">
                                <div class="product-details">
                                    <a href="product.php?id='.$p['id'].'" class = "name">'.$p['name'].'</a>
                                    <div class="price">
                                        <h6 class = "value">'.numToMoney($p['price']).'</h6>
                                        <h6 class="l-through cost">'.numToMoney($p['cost']).'</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">compare</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } 
            $myArr = array(array($sp));
            $number = 0;
            if(isset($_GET['cpage'])){
                $lan = $_GET['cpage'];
            }else{
                $lan = ceil($lan / $show);
            }
            $page = '';
            if(isset($_SESSION['page'])){
                if(ceil($lan) < 5){
                    if(ceil($lan) == 0){
                        $page = '';
                    }else{
                        if($lan == 1 || $_SESSION['page']['value'] == 1){
                            $page = '<a onclick="prev('.$lan.');" class="prev-arrow" style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
                        }else{
                            $page = '<a onclick="prev('.$lan.');" class="prev-arrow"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
                        }
                        for ($i=0; $i < ceil($lan); $i++){ 
                            $number++;
                            if($number == $_SESSION['page']['value']){
                                $page .= '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>'; 
                            }else{
                                $page .= '<a onclick="page('.$number.','.$lan.');">'.$number.'</a>';
                            }
                        }
                        if($lan == $_SESSION['page']['value'] || $lan == 1){
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow"  style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }else{
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow" aria-disabled = "false"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }
                    }
                }else{
                    if($_SESSION['page']['value'] > 3){
                            $page = '<a onclick="prev('.$lan.');" class="prev-arrow"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
                        for ($i=$_SESSION['page']['value'] - 3; $i < $_SESSION['page']['value']+1; $i++){ 
                            $number = $i;
                            if($number == $_SESSION['page']['value']){
                                $page .= '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>'; 
                            }else{
                                $page .= '<a onclick="page('.$number.','.$lan.');">'.$number.'</a>';
                            }
                        }
                        if($_SESSION['page']['value'] > 3){
                            $page .= '';
                        }else{
                            $page .='
                                <a  class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                <a onclick="page('.$number.','.$lan.');">'.$lan.'</a>
                            ';
                        }
                        if($lan == $_SESSION['page']['value'] || $lan == 1){
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow"  style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }else{
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow" aria-disabled = "false"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }
                    }else{
                        if($lan == 1 || $_SESSION['page']['value'] == 1){
                            $page = '<a onclick="prev('.$lan.');" class="prev-arrow" style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
                        }else{
                            $page = '<a onclick="prev('.$lan.');" class="prev-arrow"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
                        }
                        for ($i=0; $i < 3; $i++){ 
                            $number++;
                            if($number == $_SESSION['page']['value']){
                                $page .= '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>'; 
                            }else{
                                $page .= '<a onclick="page('.$number.','.$lan.');">'.$number.'</a>';
                            }
                        }
                        $page .='
                            <a  class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                            <a onclick="page('.$number.','.$lan.');">'.$lan.'</a>
                        ';
                        if($lan == $_SESSION['page']['value'] || $lan == 1){
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow"  style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }else{
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow" aria-disabled = "false"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }
                    }
                }
            }else{
                if(ceil($lan) < 5){
                    if(ceil($lan) == 0){
                        $page = '';
                    }else{
                        $page = '<a  class="prev-arrow" onclick="prev('.$lan.');" style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
                        for ($i=0; $i < ceil($lan); $i++){ 
                            $number++;
                            if($number == 1){
                            $page .= '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>'; 
                            }else{
                                $page .= '<a onclick="page('.$number.','.$lan.');">'.$number.'</a>';
                            }
                        }
                        if($number == 1){
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow"  style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }else{
                            $page .= '<a onclick="next('.$lan.');" class="next-arrow" aria-disabled = "false"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                        }
                    }
                }else{
                    $page = '<a onclick="prev('.$lan.');" class="prev-arrow" style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
                    for ($i=0; $i < 3; $i++){ 
                        $number++;
                        $page .='
                            <a onclick="page('.$number.');">'.$number.'</a>
                        ';
                    }
                    $page .='
                        <a  class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a >'.$lan.'</a>
                    ';
                    if($lan == 1){
                        $page .= '<a onclick="next('.$lan.');" class="next-arrow"  style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                    }else{
                        $page .= '<a onclick="next('.$lan.');" class="next-arrow" aria-disabled = "false"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
                    }
                }
            }
            
            array_push($myArr,array($page));
            if(isset($_SESSION['filter'])){
                foreach($_SESSION['filter'] as $filter => $value){
                    array_push($myArr,array($value['value'],$value['name']));
                }
            }
            if(isset($_SESSION['sort'])){
                array_push($myArr,array($_SESSION['sort']['value'],$_SESSION['sort']['name']));
            }
            if(!empty($_SESSION['page'])){
                array_push($myArr,array($_SESSION['page']['value'],$_SESSION['page']['name']));
            }
            if(isset($_SESSION['price'])){
                array_push($myArr,array($_SESSION['price']['value'],$_SESSION['price']['name']));
            }
            if(isset($_SESSION['show'])){
                array_push($myArr,array($_SESSION['show']['value'],$_SESSION['show']['name']));
            }
            echo json_encode($myArr);
            break;

        default: 
            require_once('views/shop/index.php');
            break;
        break;
    }