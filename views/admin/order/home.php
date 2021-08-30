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
                                <h3 class="card-title">Danh sách đơn hàng</h3>
                                <p class="card-text"></p>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="chall">
                                                    <label class="custom-control-label" for="d1"></label>
                                                </div>
                                            </th>
                                            <th>Mã đơn</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Số điện thoại</th>
                                            <th>Tên người nhận</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th></th>
                                            <th>Cập nhật</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                  $order=getAllOrder();
                                  foreach($order as $o){
                                      $status = "";
                                      switch($o['status']){
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
                                      
                                    echo'
                                    
                                    <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="d1">
                                        <label class="custom-control-label" for="d1"></label>
                                      </div>
                                    </td>
                                    <td>'.$o['id'].'</td>
                                    <td>'.$o['created'].'</td>
                                    <td>'.$status.'</td>
                                    <td>'.$o['phone'].'</td>
                                    <td>'.$o['name'].'</td>
                                    <td>'.$o['address'].'</td>
                                    <td>'.$o['email'].'</td>
                                    <td>
                                      <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                          <a class="dropdown-item" href="admin.php?c=order&a=detail&id='.$o['id'].'">Xem chi tiết</a>
                                          <!-- <a class="dropdown-item" href="admin.php?c=order&a=updateStatus&id='.$o['id'].'&status=3">Huỷ đơn</a> -->
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                    '.($o['status']==0?'<a data-value="admin.php?c=order&a=updateStatus&id='.$o['id'].'&status=1" class="updateStatus btn mb-2 btn-primary">Giao hàng</a>':'').'
                                    </td>
                                  </tr>
                                    ';
                                 }
                            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div>
            </div>
        </main>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/sweetalert.min.js"></script>
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
        <script>
        $(".updateStatus").on('click', function() {
            swal({
                    title: "Bạn chắc chứ?",
                    icon: "warning",
                    buttons: {
                        cancel: "Không",
                        catch: {
                            text: "Có",
                            value: "cancel",
                        },
                    },
                })
                .then((value) => {
                    if (value == "cancel") {
                        $.ajax({
                            type: "GET",
                            url: this.dataset.value,
                            success: function(response) {
                                location.reload();
                            }
                        });

                    }
                });
        });
        </script>
</body>