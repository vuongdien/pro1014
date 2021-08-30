
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Ưu đãi mỗi tuần</h1>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<?php
						$products = getProductByOffset(9,0);
						foreach($products as $product){
							echo '<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="product.php?id='.$product['id'].'"><img style="width:70px" src="'.$product['thumb'].'" alt=""></a>
								<div class="desc">
									<a href="product.php?id='.$product['id'].'" class="title">'.$product['name'].'</a>
									<div class="price">
										<h6>'.numToMoney($product['price']).'</h6>
										<h6 class="l-through">'.numToMoney($product['cost']).'</h6>
									</div>
								</div>
							</div>
						</div>';
						}
						?>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="assets/img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>