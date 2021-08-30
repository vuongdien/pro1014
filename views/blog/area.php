 <!--================Blog Area =================-->
 <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar" >
                        <div id="blogc">

                        <?php
                                        $blognews= getAllBlog();
                                        $count = 0;
                                        foreach($blognews as $news){
                                            $count++;
                                            $user = getUserById($news['user_id']);
                                            //$cata = getTagBlogById($news['id']);
                                            $catalories = '';
                                            $x = NULL;
                                            $x = getTagBlogById($news['id']);
                                            if($x){
                                                if(!isset($x['name'])){
                                                    foreach($x as $cata){
                                                        $catalories += '<a class="active" href="#">'.$cata['name'].'</a>';
                                                    }
                                                }else{
                                                    $catalories = '<a class="active" href="#">'.$x['name'].'</a>';
                                                }
                                            }
                                            
                                            if($count<4){
                                                
                                           echo'
                                           <article class="row blog_item">
                                               <div class="col-md-3">
                                                   <div class="blog_info text-right">
                                                       <div class="post_tag">
                                                       '.$catalories.'
                                                       </div>
                                                      
                                                              <ul class="blog_meta list">
                                                              <li><a href="#">'.$user['fullname'].'<i class="lnr lnr-user"></i></a></li>
                                                              <li><a href="#">'.$news['created'].'<i class="lnr lnr-calendar-full"></i></a></li>
                                                              <li><a href="#">'.$news['view'].' Lượt xem<i class="lnr lnr-eye"></i></a></li>
                                                              <li><a href="#"> Bình luận<i class="lnr lnr-bubble"></i></a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-9">
                                                      <div class="blog_post">
                                                          <img src="'.$news['thumb'].'" alt="">
                                                          <div class="blog_details">
                                                              <a href="blog.php?action=detail&id='.$news['id'].'">
                                                                  <h2>'.$news['title'].'</h2>
                                                              </a>
                                                              <p>'.$news['description'].'</p>
                                                              <a href="blog.php?action=detail&id='.$news['id'].'" class="white_bg_btn">Xem thêm</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  </article>
                                                              ';   
                                            }
                                          

                                        }
                                    ?>


                        </div>
                  
                                   
                      
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <?php
                                   $countblog = getCountBlog();
                                   $number =0; 
                                   $time = ceil($countblog['countb']);
                                   if($time < 4){
                                    for ($i=0; $i < $time; $i++){ 
                                        $number++;
                                        echo'
                                            <a onclick="page('.$number.');">'.$number.'</a>
                                        ';
                                    }
                                }else{
                                    for ($i=0; $i < 4; $i++){ 
                                        $number++;
                                        echo'
                                            <a onclick="page('.$number.');">'.$number.'</a>
                                        ';
                                    }
                                    echo'
                                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                        <a href="#">'.$time.'</a>
                                    ';
                                }
                                ?>
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm kiếm'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="assets/img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
                            <p>Tác giả kì cựu</p>
                            <div class="social_icon">
                                <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
                                <a href="https://github.com/huynguyeexn/PRO1014"><i class="fa fa-github"></i></a>
                                <a href="https://www.behance.net/"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Sneaker là giày thể thao, có đế mềm với phần trên được làm bằng vải hoặc bạt, da. Không chỉ được sử dụng trong các hoạt động thể thao, sneaker hiện nay còn trở thành một trong những sản phẩm phổ biến, không thể thiếu của các tín đồ thời trang. Sneaker có vẻ ngoài thể thao, khỏe khoắn, năng động, mang lại sự dễ chịu, thoải mái cho người sử dụng. </p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết phổ biến</h3>
                            <?php
                                 $blogs = getAllBlog();
                                 foreach($blogs as $blog){
                                     echo'
                                     <div class="media post_item">
                                <img src="'.$blog['thumb'].'" alt="post" width="100px" height="60px">
                                <div class="media-body">
                                    <a href="blog.php?action=detail&id='.$news['id'].'">
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
                            <h4 class="widget_title">Danh mục bài viết</h4>
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
                            <h4 class="widget_title">Thư điện tử</h4>
                            <p>
                            Bạn có thể để lại email của bạn ở đây</p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Subscribe</a>
                            </div>
                            <p class="text-bottom">Bạn có thể hủy đăng kí bất kì lúc nào</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Từ khóa</h4>
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
    <script>
	function page(x){
			var start = (x*3) - 3;
			
			var d = document.getElementById("blogc");			
			$.ajax({
				url: 'blog.php',
                type: 'GET',
                data : 'action=page&start='+start,
              	success : function(data) 
                        { 
							d.innerHTML = data;
                        }
              });
              return false;
	}
</script>