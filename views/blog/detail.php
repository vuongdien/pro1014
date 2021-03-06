<!DOCTYPE html>

<head>
    <?php include_once('views/layouts/meta.php'); ?>
</head>

<body>

    <!-- Start Header Area -->
    <?php include_once('views/layouts/header.php'); ?>
    <!-- End Header Area -->

    <!-- Start banner Area -->
    <?php include_once('views/blog/banner.php'); ?>
    <!-- End banner Area -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <?php
                       
                          $user = getUserById($blog['user_id']);
                          $catalories = '';
                          $x = getTagBlogById($blog['id']);
                          if(isset($x[0])){
                            foreach($x as $cata){
                                $catalories += '<a class="active" href="#">'.$cata['name'].'</a>';
                            }
                          }else{
                              $catalories = '<a class="active" href="#">'.$x['name'].'</a>';
                          }
                            echo '
                            
                    <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="'.$blog['thumb'].'" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <div class="post_tag">
                                
                                '.$catalories.'
                                
                            </div>
                            <ul class="blog_meta list">
                                <li><a href="#">'.$user['fullname'].'<i class="lnr lnr-user"></i></a></li>
                                <li><a href="#">'.$blog['created'].'<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#">'.$blog['view'].' L?????t xem<i class="lnr lnr-eye"></i></a></li>
                                <li><a href="#"> B??nh lu???n<i class="lnr lnr-bubble"></i></a></li>
                            </ul>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>'.$blog['title'].'</h2>
                        <p class="excert">
                           '.$blog['content'].'
                        </p>
                      
                    </div>
                    <div class="col-lg-12">
                        <div class="quotes">
                            
                        </div>
                        <div class="row">
                            
                                <div class="col-6">
                                
                            </div>
                            <div class="col-lg-12 mt-25">
                               
                            </div>
                        </div>
                    </div>
                </div>
                            ';
                        ?>
                    
                    <div class="comment-form">
                        <h4>????? l???i b??nh lu???n t???i ????y</h4>
                        <?php
                            // $_SESSION['user_id'] = 1;
                            $idblog =$_GET['id'];
                            if(isset($_SESSION['user'])){
                        echo '
                        <form action ="blog.php?action=comment&id='.$idblog.'" method = "POST">
                            <div class="form-group form-inline">
                            <input type="hidden" class="form-control" name="uid"  onfocus=""  onblur="">
                              
                            </div>
                          
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="" onblur="" required=""></textarea>
                            </div>
                           <button type ="submit" class="primary-btn submit_btn" name="submit">G???i b??nh lu???n</button>
                        </form>
                        ';                                    
                    }
                    else{
                        echo '<div class="row">
                        <div class="col-12 text-center">
                            <p>Vui l??ng <a style="text-decoration: underline" href="account.php">????ng Nh???p</a> ????? b??nh lu???n.</p>
                        </div>
                    </div>';
                    }
                    ?>
                    </div>
                    <div class="comments-area">


                        <h4>B??nh lu???n</h4>
                        <?php
                            $blogcomment = getBlogCommentByBlogId($blog['id']);
                           
                            foreach($blogcomment as $blogcom){
                                $users = getUserById($blogcom['user_id']);
                                echo'
                                <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                    <img src="'.($users['avartar']?$users['avartar']:'assets/img/user/noavt.jpg').'" alt="">
                                </div>
                                        <div class="desc">
                                            <strong>'.$users['fullname'].'</strong>
                                            <p class="date">'.$blogcom['created'].'</p>
                                            <p class="comment">
                                            '.$blogcom['content'].'
                                            </p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                                ';
                            }
                    ?>


                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="T??m ki???m" onfocus=""
                                    onblur="this.placeholder = 'T??m ki???m'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="assets/img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
                            <p>T??c gi??? k?? c???u</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Sneaker l?? gi??y th??? thao, c?? ????? m???m v???i ph???n tr??n ???????c l??m b???ng v???i ho???c b???t, da. Kh??ng
                                ch??? ???????c s??? d???ng trong c??c ho???t ?????ng th??? thao, sneaker hi???n nay c??n tr??? th??nh m???t trong
                                nh???ng s???n ph???m ph??? bi???n, kh??ng th??? thi???u c???a c??c t??n ????? th???i trang. Sneaker c?? v??? ngo??i
                                th??? thao, kh???e kho???n, n??ng ?????ng, mang l???i s??? d??? ch???u, tho???i m??i cho ng?????i s??? d???ng. </p>

                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">B??i vi???t ph??? bi???n</h3>
                            <?php
                                 $blogs = getAllBlog();
                                 foreach($blogs as $blog){
                                     echo'
                                     <div class="media post_item">
                                <img src="'.$blog['thumb'].'" alt="post" width="100px" height="60px">
                                <div class="media-body">
                                    <a href="blog.php?action=detail&id='.$blog['id'].'">
                                        <h3>'.$blog['title'].'</h3>
                                    </a>
                                    <p>'.$blog['created'].'</p>
                                </div>
                            </div>
                                     ';
                                 }
                            ?>

                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="assets/img/blog/add.jpg" alt=""></a>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Danh m???c b??i vi???t</h4>
                            <ul class="list cat-list">

                                <?php
                                    $blogs = getAllTagBlog();
                                    foreach($blogs as $blog){
                                        echo'
                                        <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>'.$blog['name'].'</p>
                                        
                                    </a>
                                </li>
                                        
                                        ';
                                    } 
                                ?>
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Th?? ??i???n t???</h4>
                            <p>
                                B???n c?? th??? ????? l???i email c???a b???n ??? ????y

                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Enter email" onfocus="" onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Subscribe</a>
                            </div>
                            <p class="text-bottom">B???n c?? th??? h???y ????ng k?? b???t k?? l??c n??o</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">T??? kh??a</h4>
                            <ul class="list">
                                <?php
                            $blogs = getAllTagBlog();
                            foreach($blogs as $blog){
                                echo'
                                <li><a href="#">'.$blog['name'].'</a></li>
                                ';}
                            ?>

                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- start footer Area -->
    <?php include_once('views/layouts/footer.php'); ?>
    <!-- End footer Area -->

    <?php include_once('views/layouts/script.php'); ?>
</body>

</html>