<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once 'views/layouts/meta.php'; ?>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<!-- Start Header Area -->
	<?php include_once 'views/layouts/header.php'; ?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<?php include_once 'views/products/banner.php'?>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<?php include_once 'views/products/single_product.php'?>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
    <?php include_once 'views/products/product_descriptions.php'?>
	<!--================End Product Description Area =================-->

	<!-- Start related-product Area -->
	<?php include_once 'views/layouts/RelatedProduct.php'?>
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php include_once 'views/layouts/footer.php'; ?>
	<!-- End footer Area -->

	
	<?php include_once 'views/layouts/script.php'; ?>

</body>

</html>