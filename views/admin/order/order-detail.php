<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }
    </style>
</head>

<body class="vertical  dark  ">
    <div class="wrapper">
        <!-- Top Navbar -->
        <?php include_once('views/admin/layout/topnav.php') ?>
        <!-- End Top Navbar -->

        <!-- Left Sidebar -->
        <?php include_once('views/admin/layout/sidebar.php') ?>
        <!-- End Left Sidebar -->

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Striped rows -->
                    <div class="col-md-12 my-4 float-right">
                        <div class="card shadow">
                            <div class="card-body">
                                <h3 class="card-title">Đơn hàng chi tiết</h3>
                                <p class="card-text"></p>
                                <div class="form-group mb-3">
                                    <label class="bold">Mã đơn:</label>
                                    <strong><?=$order['id']?></strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-disable">Người nhận:</label>
                                    <strong><?=$order['name']?></strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-disable">Số điện thoại:</label>
                                    <strong><?=$order['phone']?></strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-disable">Email:</label>
                                    <strong><?=$order['email']?></strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-disable">Địa chỉ:</label>
                                    <strong><?=$order['address']?></strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-disable">Ngày đặt:</label>
                                    <strong><?=$order['created']?></strong>
                                </div>
                                <div class="form-group mb-3">
                                    <?php
                                    $status = "";
                                    switch($order['status']){
                                        case 0:
                                          $status = '<button type="button" class="btn mb-2 btn-outline-primary">Mới</button>';
                                        break;
                                        case 1:
                                          $status = '<button type="button" class="btn mb-2 btn-outline-warning">Đang giao</button>';
                                        break;
                                        case 2:
                                          $status = '<button type="button" class="btn mb-2 btn-outline-success">Đã giao</button>';
                                        break;
                                        case 3:
                                          $status = '<button type="button" class="btn mb-2 btn-outline-danger">Huỷ</button>';
                                        break;
                                    }
                                    ?>
                                    <label for="example-disable">Trạng thái:</label>
                                    <strong><?=$status?></strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-disable">Tổng tiền:</label>
                                    <strong><?=numToMoney(totalPriceOfOrder($order['id'])['total'])?></strong>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                        <div class="col-md-12 my-4 mb-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="card-title">Sản phẩm trong đơn hàng</strong>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush my-n3">
                                        <?php
                                            foreach($orderItems as $item){
                                                $product = getProductById($item['product_id']);
                                                $total = $item['quantity'] * $item['price'];
                                                echo '
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col-1">
                                                            <img src="'. $product['thumb'].'" alt="'. $product['name'].'" class="thumbnail-sm">
                                                        </div>
                                                        <div class="col-6">
                                                            <strong>'. $product['name'].'</strong>
                                                            <div class="my-0 text-muted small">Size '. $item['size_id'].'</div>
                                                        </div>
                                                        <div class="col text-center">
                                                            <strong>'. numToMoney($item['price']).'</strong>
                                                        </div>
                                                        <div class="col text-center">
                                                            <strong>x'. $item['quantity'].'</strong>
                                                        </div>
                                                        <div class="col text-center">
                                                            <strong>'.numToMoney($total).'</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        ?>
                                        
                                    </div> <!-- / .list-group -->
                                </div> <!-- / .card-body -->
                            </div> <!-- / .card -->
                        </div> <!-- / .col-md-3 -->
                </div>
            </div>
        </main>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/assets/js/moment.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>
        <script src='assets/js/daterangepicker.js'></script>
        <script src='assets/js/jquery.stickOnScroll.js'></script>
        <script src="assets/js/tinycolor-min.js"></script>
        <script src="assets/js/config.js"></script>
        <script src='assets/js/jquery.dataTables.min.js'></script>
        <script src='assets/js/dataTables.bootstrap4.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>