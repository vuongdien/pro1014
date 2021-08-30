<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('views/layouts/meta.php'); ?>
</head>

<body>
    <?php
    // foreach($layouts as $layout){
    // 	echo "<!-- Start $layout Area -->";
    // 	include_once("views/$layout.php");
    // 	echo "<!-- End Header Area -->";
    // }
    ?>
    <!-- Start Header Area -->
    <?php include_once('views/layouts/header.php'); ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <?php include_once('views/shop/bannerArea.php'); ?>
    <!-- End Banner Area -->

    <?php include_once('views/shop/container.php'); ?>

    <!-- Start related-product Area -->
    <?php include_once('views/layouts/RelatedProduct.php'); ?>
    <!-- End related-product Area -->

    <!-- start footer Area -->
    <?php include_once('views/layouts/footer.php'); ?>
    <!-- End footer Area -->

    <!-- Modal Quick Product View -->
    <?php include_once('views/shop/modal.php'); ?>


    <?php include_once('views/layouts/script.php'); ?>
</body>

</html>