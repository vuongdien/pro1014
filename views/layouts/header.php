

<div id="overlay"></div>
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.php"><img src="assets/img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
						<li class="nav-item"><a class="nav-link" href="shop.php">Cửa hàng</a></li>
						<li class="nav-item"><a class="nav-link" href="blog.php">Tin tức</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">Giới thiệu</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Liên hệ</a></li>
						<?php
							if(isset($_SESSION['user'])){
								if(isset($_SESSION['user']['rank']) && $_SESSION['user']['rank'] > 1){
									echo '<li class="nav-item"><a class="nav-link" href="admin.php">Quản trị</a></li>';
								}else{
									echo '<li class="nav-item"><a class="nav-link" href="user.php">Tài khoản</a></li>';
								}
								echo '<li class="nav-item"><a class="nav-link" href="account.php?action=signout">Đăng xuất</a></li>';
							}else{
								echo '<li class="nav-item"><a class="nav-link" href="account.php">Đăng nhập</a></li>';
							}
						?>
						
						<li class="nav-item"><a class="nav-link" href="cart.php" id="linkToCart">
							<?php
								if(isset($_SESSION['cart'])){
									$quantity = 0;
									foreach ($_SESSION['cart'] as $e)  {
										$quantity += $e['quantity'];
									}
									echo "Giỏ hàng ($quantity)";
								}else{
									echo "Giỏ hàng (0)";
								}
							?>
						</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="search_input" id="search_input_box" style="padding: 0">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="search" class="form-control" autocomplete="off" id="search_input" onkeyup="search(this.value);" placeholder="Bạn muốn tìm gì...?">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Đóng"></span>
			</form>
		</div>
		<div style="width:100%;background:white;" id='show_search' class="search">
			<ul style="width:100%;height:auto;padding-bottom:15px;">
			</ul>
		</div>
	</div>
</header>
<script>
	function search(x){
          var sanpham = document.getElementById('show_search');
          $.ajax({
          url: 'home.php?action=search',
            type: 'GET',
            data : 'content='+x,
            success : function(data) 
            { 
              sanpham.innerHTML=data;
            }
          });
          return false; 
        }
</script>