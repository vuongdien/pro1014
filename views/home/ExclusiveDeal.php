<section class="exclusive-deal-area">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding exclusive-left">
                <div class="row clock_sec clockdiv" id="clockdiv">
                    <div class="col-lg-12">
                        <h1>Ưu đãi sắp kết thúc!</h1>
                        <p></p>
                    </div>
                    <div class="col-lg-12">
                        <div class="row clock-wrap">
                            <div class="col clockinner1 clockinner">
                                <h1 class="days">0</h1>
                                <span class="smalltext">Days</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="hours">0</h1>
                                <span class="smalltext">Hours</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="minutes">0</h1>
                                <span class="smalltext">Mins</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="seconds">0</h1>
                                <span class="smalltext">Secs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="shop.php" class="primary-btn">Mua sắm ngay</a>
            </div>
            <div class="col-lg-6 no-padding exclusive-right">
                <div class="active-exclusive-product-slider">
                    <?php
							$items = getAllDealDetailById(1);
							$size = getSizeOfProduct($product['id']);
							$html = "";
							foreach ($size as $s) {
								$html .=  '<option value="' . $s['size_id'] . '">Size ' . $s['size_id'] . '</option>';
							}
							foreach($items as $item){
								$product = getProductById($item['product_id']);
								echo '<!-- single exclusive carousel -->
								<div class="single-exclusive-slider">
									<img class="img-fluid" src="'.$item['deal_thumb'].'" alt="">
									<div class="product-details">
										<div class="price">
											<h6>'.numToMoney($product['price']).'</h6>
											<h6 class="l-through">'.numToMoney($product['cost']).'</h6>
										</div>
										<h4>'.$product['name'].'</h4>
										<div class="add-bag d-flex align-items-center justify-content-center">
											<div class="default-select mb-2" >
												<select>
													' . $html . '
												</select>
											</div>
											<a class="add-btn addtocart"  value="' . $product["id"] . '"><span class="ti-bag"></span></a>
											<span class="add-text text-uppercase">Thêm vào giỏ</span>
										</div>
									</div>
								</div>';
							}
						?>

                </div>
            </div>
        </div>
    </div>
</section>