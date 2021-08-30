<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Danh mục</div>
					<ul class="main-categories">
						<li onclick="filter('delete',1);"  class="main-nav-list"><a class="color" data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
							class="lnr lnr-arrow-right"></span>Tất cả</a>
						</li>
						<?php
							$tag = getAllTag();
							$i = -1;
							foreach($tag as $t){
								$i++;
								echo'
									<li onclick="filter('.$t['id'].',1,1);"  class="main-nav-list"><a class="color" data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
											class="lnr lnr-arrow-right"></span>'.$t['name'].'</a>
									</li>
								';
							}
						?>
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Danh mục liên quan</div>
					<div class="common-filter">
						<div class="head">Thương hiệu</div>
						<form action="#">
							<ul>
								<?php
									$brand = getAllBrand();
									$i=0;
									foreach($brand as $b){
										$i++;
										echo'
											<li onclick="filter('.$b['id'].',3,1);" class="filter-list"><input class="pixel-radio" type="radio" id="'.$b['name'].'" name="brand"><label for="'.$b['name'].'">'.$b['name'].'</label></li>
										';
									}
								?>
								<li onclick="filter('delete',3);" class="filter-list"><input class="pixel-radio" type="radio" id="'.$b['name'].'" name="brand"><label for="'.$b['name'].'">All Brand</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Nhóm màu</div>
						<form action="#">
							<ul>
								<?php
									$color = getAllColor();
									foreach($color as $c){
										$i++;
										echo'
										<li onclick="filter('.$c['id'].',2,1);" class="filter-list"><input class="pixel-radio" type="radio" id="'.$c['name'].'" name="color"><label for="'.$c['name'].'">'.$c['name'].'</label></li>
										';
									}
								?>
								<li onclick="filter('delete',2);" class="filter-list"><input class="pixel-radio" type="radio" id="'.$c['name'].'" name="color"><label for="'.$c['name'].'">Tất cả</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Giá</div>
						<div class="price-range-area">
							<div id="price-range" onmouseup="price();"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select id='idsort' onchange="sort(this.value,1)">
							<option value="1">Phù hợp nhất</option>
							<option value="2">Sản phẩm mới nhất</option>
							<option value="3">Sản phẩm được mua nhiều nhất</option>
							<option value="4">Giá từ thấp tới cao</option>
							<option value="5">Giá từ cao xuống thấp</option>
						</select>
					</div>
					<div  class="sorting mr-auto">
						<select id='idshow' onchange="show(this.value,1)">
							<option value="6">6 Sản phẩm</option>
							<option value="9">9 Sản phẩm</option>
							<option value="12">12 Sản phẩm</option>
						</select>
					</div>
					<div id ='pagination' class="pagination">	
						<?php
							$where = '';
							$true = 1;
							$page = 1;
							if(isset($_GET['tag']) || isset($_GET['color']) || isset($_GET['brand']) || isset($_GET['sort'])|| isset($_GET['page'])|| isset($_GET['price'])|| isset($_GET['show'])){
								if(isset($_GET['show'])){
									$show = $_GET['show'];
								}else{
									$show = 6;
								}
								if(isset($_GET['tag'])){
									$true = 2;
									$tag = $_GET['tag'];
									$where .= !empty($where) ? ' and id IN(select id from product  INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$tag.')': 'INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$tag.'';
								}
								if(isset($_GET['color'])){
									$true = 2;
									$color = $_GET['color'];
									$where .= !empty($where) ? ' and product.id IN(select product.id from product where color_id =  '.$value['value'].')': 'INNER JOIN color on color.id = color_id where color_id = '.$value['value'].'';
								}
								if(isset($_GET['brand'])){
									$true = 2;
									$brand = $_GET['brand'];
									$where .= !empty($where) ? ' and product.id IN(select product.id from product INNER JOIN brand on brand.id = brand_id where brand_id = '.$brand.')': 'INNER JOIN brand on brand.id = brand_id where brand_id ='.$brand.'';
								}
								if(isset($_GET['price'])){
									$true = 2;
									$lower = $_SESSION['price']['lower'];
									$upper = $_SESSION['price']['upper'];
									$where .= !empty($where) ? ' and price BETWEEN '.$lower.' and '.$upper.'': ' where price BETWEEN '.$lower.' and '.$upper.'';
								}
								if(isset($_GET['sort'])){
									$true = 2;
									$value = $_GET['sort']; 
									if($value == 1){
										$where .= '';
									}else if($value == 2){
										$where .= ' order by `update` desc';
									}else if($value == 3){
										$where .= ' order by view desc';
									}else if($value == 4){
										$where .= ' order by price asc';
									}else if($value == 5){
										$where .= ' order by price desc';
									}
								}
								if(isset($_GET['page']) || isset($_GET['show'])){
									if(isset($_GET['page'])){
										$offset = ($_GET['page'] - 1) * $show ;
										$page = $_GET['page'];
										$limit = $show;
									}else{
										$offset = ($page - 1) * $show ;
										$page = $page;
										$limit = $show;
									}
									if($true == 2){
										$where .= ' limit '.$limit.' offset '.$offset.'';
										$product = getProductByFilter($where); 
									}else{
										$product = getProductByOffset($limit, $offset);
									}
								}else{
									$product = getProductByFilter($where);
								}
								if(isset($_SESSION['page'])){
									$lan = $_SESSION['page']['tong'];
								}else{
									$luot = 0;
									foreach($product as $p){
										$luot++;
									}
									$lan= ceil($luot/$show);
								}
							}else{
								unset($_SESSION['filter']);
								unset($_SESSION['sort']);
								unset($_SESSION['page']);
								unset($_SESSION['price']);
								unset($_SESSION['show']);
								$product = getProductByOffset(6,0);
								$dproduct = getCountProduct();
								$lan = ceil($dproduct['count']);
							}
							$number = 0;
							if($lan == 1 || $page == 1){
								echo '<a onclick="prev('.$lan.');" class="prev-arrow" style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
							}else{
								echo '<a onclick="prev('.$lan.');"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
							}
							if($lan < 3){
								for ($i=0; $i < $lan; $i++){ 
									$number++;
									if($number == $page){
										echo '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>';
									}else{
										echo'
											<a onclick="page('.$number.','.$lan.');">'.$number.'</a>
										';
									}
								}
							}else{
								if($page > 3){
									for ($i=$page - 3; $i < $page +1; $i++){ 
										$number = $i;
										if($number == $page){
											echo '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>';
										}else{
											echo'
												<a onclick="page('.$number.','.$lan.');">'.$number.'</a>
											';
										}
									}
									if($page < 3){
										echo'
											<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
											<a href="#">'.$lan.'</a>
										';
									}
								}else{
									for ($i=0; $i < 3; $i++){ 
											$number++;
											if($number == $page){
												echo '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>';
											}else{
												echo'
													<a onclick="page('.$number.','.$lan.');">'.$number.'</a>
												';
											}
										}
										echo'
											<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
											<a href="#">'.$lan.'</a>
										';
									}
								}
							if($lan == $page || $lan == 1){
								echo '<a onclick="next('.$lan.');" class="next-arrow"  style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
							}else{
								echo '<a onclick="next('.$lan.');" aria-disabled = "false"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
							}
						?>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div id="row" class="row">
						<!-- single product -->
						<?php
							$i = 0;
							foreach($product as $p){
								$size = getSizeOfProduct($p['id']);
								$i++;
									echo'
										<div class="col-lg-4 col-md-6">
											<div class="boxa single-product">
												<img class="img-fluid" src="'.$p['thumb'].'" alt="">
												<div class="product-details">
													<a href="product.php?id='.$p['id'].'" class = "name">'.$p['name'].'</a>
													<div class="price">
														<h6 class = "value">'.numToMoney($p['price']).'</h6>
														<h6 class="l-through cost">'.numToMoney($p['cost']).'</h6>
													</div>
													<div class="prd-bottom d-flex align-items-center">
														<div class="size-select p-0">
															<select style="display: none;">';
															foreach($size as $s){
																echo '<option value="'.$s['size_id'].'">Size '.$s['size_id'].'</option>';
															}
															echo '
															</select>
															<div class="nice-select  px-1" tabindex="0" style="background: unset; border: unset; ">
																<span class="current" style="margin-right: 25px;">Size '.$size[0]['size_id'].'</span>';
																
															echo'<ul class="list">';
																foreach($size as $s){
																	echo '<li data-value="'.$s['size_id'].'" class="option">Size '.$s['size_id'].'</li>';
																}
																echo '
																</ul>
															</div>
														</div>
														<a class="social-info addtocart" value="' . $p["id"] . '">
															<span class="ti-bag"></span>
															<p class="hover-text">add to bag</p>
														</a>
														<a href="" class="social-info">
															<span class="lnr lnr-heart"></span>
															<p class="hover-text">Wishlist</p>
														</a>
													</div>
												</div>
											</div>
										</div>
									';
							}
						?>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
				<div  class="sorting mr-auto">
						<select id='idshow1' onchange="show(this.value,1)">
							<option value="6">Show 6</option>
							<option value="9">Show 9</option>
							<option value="12">Show 12</option>
						</select>
					</div>
					<div id ='pages' class="pagination">
						<?php
							$number = 0;
							if($lan == 1 || $page == 1){
								echo'<a onclick="prev('.$lan.');" class="prev-arrow" style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
							}else{
								echo '<a onclick="prev('.$lan.');"><i class="fa fa-long-arrow-left"  aria-hidden="true"></i></a>';
							}
							if($lan < 3){
								for ($i=0; $i < $lan; $i++){ 
									$number++;
									if($number == $page){
										echo '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>';
									}else{
										echo'
											<a onclick="page('.$number.','.$lan.');">'.$number.'</a>
										';
									}
								}
							}else{
								if($page > 3){
									for ($i=$page - 3; $i < $page +1; $i++){ 
										$number = $i;
										if($number == $page){
											echo '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>';
										}else{
											echo'
												<a onclick="page('.$number.','.$lan.');">'.$number.'</a>
											';
										}
									}
									if($page < 3){
										echo'
											<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
											<a href="#">'.$lan.'</a>
										';
									}
								}else{
									for ($i=0; $i < 3; $i++){ 
											$number++;
											if($number == $page){
												echo '<a class="active" onclick="page('.$number.','.$lan.');">'.$number.'</a>';
											}else{
												echo'
													<a onclick="page('.$number.','.$lan.');">'.$number.'</a>
												';
											}
										}
										echo'
											<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
											<a href="#">'.$lan.'</a>
										';
									}
								}
							if($lan == $page || $lan == 1){
								echo '<a onclick="next('.$lan.');" class="next-arrow"  style ="pointer-events: none;cursor: default;"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
							}else{
								echo '<a onclick="next('.$lan.');" aria-disabled = "false"><i class="fa fa-long-arrow-right"  aria-hidden="true"></i></a>';
							}
						?>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
	<script>
		$( window ).load(function() {
			var href = window.location.search.substr(1);
			var tt = href.split('&',8)
			for(i=0;i<10;i++){
				var tt1 = tt[i].split('=',2)
				if(tt1[0] == 'sort'){
					var sort = document.getElementById("idsort");
					var select = sort.options[tt1[1]-1]
					select.setAttribute('selected', true);
				}
				if(tt1[0] == 'show'){
					alert(tt1)
					var show = document.getElementById("idshow");
					if(tt1[1] == 6)
					{
						var so = 0;
					}else if(tt1[1] == 9)
					{
						var so = 1;
					}else(tt1[1] == 12)
					{
						var so = 2;
					}
					var select1 = show.options[so]
					alert(so)
					select1.setAttribute('selected', true);
				}
			}
		});
		

		function page(x,p){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			$.ajax({
				url: 'shop.php',
                type: 'GET',
                data : 'action=page&start='+x+'&cpage='+p,
              	success : function(data) 
                        { 
							var myObj = JSON.parse(data);
							d.innerHTML = myObj[0];
							pages.innerHTML=myObj[1];
							page.innerHTML = myObj[1]
							x='shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
                        }
              });
              return false;
		}

		function filter(x,t,p){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'shop.php',
                type: 'GET',
                data : 'action=page&name='+t+'&value='+x+'&page=1', //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var myObj = JSON.parse(data);
							var x = 'shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
							d.innerHTML= myObj[0];
							page.innerHTML= myObj[1];
							pages.innerHTML= myObj[1];
                        }
              });
              return false;
		}
		
		function sort(x,p){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'shop.php',
                type: 'GET',
                data : 'action=page&sort='+x+'&page=1', //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var myObj = JSON.parse(data);
							var x = 'shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
							d.innerHTML= myObj[0];
							page.innerHTML= myObj[1];
							pages.innerHTML= myObj[1];
                        }
              });
              return false;
		}

		function price(p){
			var lower = document.getElementById("lower-value").innerText;
			var upper = document.getElementById("upper-value").innerText;
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'shop.php',
                type: 'GET',
                data : 'action=page&lower='+lower+'&upper='+upper+'&page=1', //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var myObj = JSON.parse(data);
							var x = 'shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
							d.innerHTML= myObj[0];
							page.innerHTML= myObj[1];
							pages.innerHTML= myObj[1];
                        }
              });
              return false;
		}

		function show(x,p){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'shop.php',
                type: 'GET',
                data : 'action=page&show='+x+'&page=1', //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var myObj = JSON.parse(data);
							var x = 'shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
							d.innerHTML= myObj[0];
							page.innerHTML= myObj[1];
							pages.innerHTML= myObj[1];
                        }
              });
              return false;
		}

		function next(z){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			var x= 'next'
			$.ajax({
				url: 'shop.php',
                type: 'GET',
                data : 'action=page&button='+x+"&cpage="+z,
              	success : function(data) 
                        { 
							var myObj = JSON.parse(data);
							d.innerHTML = myObj[0];
							pages.innerHTML=myObj[1];
							page.innerHTML=myObj[1];
							x='shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
                        }
              });
              return false;
		}
		function prev(z){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			var x= 'back'
			$.ajax({
				url: 'shop.php',
                type: 'GET',
                data : 'action=page&button='+x+"&cpage="+z,
              	success : function(data) 
                        { 
							var myObj = JSON.parse(data);
							d.innerHTML = myObj[0];
							page.innerHTML=myObj[1];
							pages.innerHTML=myObj[1];
							x='shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
                        }
              });
              return false;
		}
	</script>