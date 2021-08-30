<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('views/layouts/meta.php'); ?>
    <style>
    .product-image {
        width: 150px
    }
    </style>
</head>

<body>

    <!-- Start Header Area -->
    <?php include_once('views/layouts/header.php'); ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <?php include_once('views/cart/banner.php'); ?>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <?php include_once('views/cart/cartarea.php'); ?>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <?php include_once('views/layouts/footer.php'); ?>
    <!-- End footer Area -->

    <?php include_once('views/layouts/script.php'); ?>

</body>

</html>