<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Sản phẩm Hot</h1>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$products = getProductByOffset(8, 0);
				foreach ($products as $product) {
					$size = getSizeOfProduct($product['id']);
					$html = "";
					foreach ($size as $s) {
						$html .=  '<option value="' . $s['size_id'] . '">Size ' . $s['size_id'] . '</option>';
					}
					echo '<!-- single product -->
								<div class="col-lg-3 col-md-6">
									<div class="single-product">
										<img class="img-fluid" src="' . $product["thumb"] . '" alt="">
										<div class="product-details">
											<h6><a href="product.php?id=' . $product["id"] . '">' . $product["name"] . '</a></h6>
											<div class="price">
												<h6>' . numToMoney($product["price"]) . '</h6>
												<h6 class="l-through">' . numToMoney($product["cost"]) . '</h6>
											</div>
											<div class="prd-bottom">
											<div class="default-select mb-2" >
												<select>
													' . $html . '
												</select>
											</div>
												<a class="social-info addtocart" value="' . $product["id"] . '">
													<span class="ti-bag"></span>
													<p class="hover-text">Thêm vào giỏ</p>
												</a>
												<a  class="social-info">
													<span class="lnr lnr-heart"></span>
													<p class="hover-text">Yêu thích</p>
												</a>
											</div>
										</div>
									</div>
								</div>';
				}
				?>
			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Được mua nhiều</h1>
						<p></p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
				$products = getProductByOffset(8, 0);
				foreach ($products as $product) {
					$size = getSizeOfProduct($product['id']);
					$html = "";
					foreach ($size as $s) {
						$html .=  '<option value="' . $s['size_id'] . '">Size ' . $s['size_id'] . '</option>';
					}
					echo '<!-- single product -->
								<div class="col-lg-3 col-md-6">
									<div class="single-product">
										<img class="img-fluid" src="' . $product["thumb"] . '" alt="">
										<div class="product-details">
											<h6><a href="product.php?id=' . $product["id"] . '">' . $product["name"] . '</a></h6>
											<div class="price">
												<h6>' . numToMoney($product["price"]) . '</h6>
												<h6 class="l-through">' . numToMoney($product["cost"]) . '</h6>
											</div>
											<div class="prd-bottom">
											<div class="default-select mb-2" >
												<select>
													' . $html . '
												</select>
											</div>
												<a class="social-info addtocart" value="' . $product["id"] . '">
													<span class="ti-bag"></span>
													<p class="hover-text">Thêm vào giỏ</p>
												</a>
												<a  class="social-info">
													<span class="lnr lnr-heart"></span>
													<p class="hover-text">Yêu thích</p>
												</a>
											</div>
										</div>
									</div>
								</div>';
				}
				?>
			</div>
		</div>
	</div>
</section>