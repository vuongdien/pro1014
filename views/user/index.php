<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="assets/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="assets/css/feather.css">
    <link rel="stylesheet" href="assets/css/select2.css">
    <link rel="stylesheet" href="assets/css/dropzone.css">
    <link rel="stylesheet" href="assets/css/uppy.min.css">
    <link rel="stylesheet" href="assets/css/jquery.steps.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="assets/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="assets/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="assets/css/app-dark.css" id="darkTheme">
</head>

<body class="vertical  dark  ">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
                    placeholder="Type something..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                        <span class="fe fe-grid fe-16"></span>
                    </a>
                </li>
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                        <span class="fe fe-bell fe-16"></span>
                        <span class="dot dot-md bg-success"></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="./assets/assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="account.php?action=signout">Sign Out</a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.php">
                        <img src="assets/img/fav.png" alt="" style="width: 50px;">
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="user.php" aria-expanded="false" class="nav-link">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main role="main" class="main-content">

            <!-- Bordered table -->
            <div class="col-12 my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Đơn hàng của bạn</h3>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Tên người nhận</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              foreach($orders as $order){
                                $status = "";
                                $total = numToMoney(totalPriceOfOrder($order['id'])['total']);
                                // Mới(0), đang giao(1), đã hoàn thành (2), Hủy(3)
                                switch($order['status']){
                                  case 0: 
                                    $status = '<button type="button" class="btn mb-2 btn-outline-primary">Đang gói hàng</button>';
                                  break;
                                  case 1: 
                                    $status = '<button type="button" class="btn mb-2 btn-outline-warning">Đang giao hàng</button>';
                                  break;
                                  case 2: 
                                    $status = '<button type="button" class="btn mb-2 btn-outline-success">Đã giao</button>';
                                  break;
                                  case 3: 
                                    $status = '<button type="button" class="btn mb-2 btn-outline-danger">Đã Huỷ</button>';
                                  break;
                                }
                                echo '
                                <tr>
                                  <td>'.$order['id'].'</td>
                                  <td>'.$order['created'].'</td>
                                  <td>'.$total.'</td>
                                  <td>'.($order['name'] ? $order['name'] : $user['fullname']).'</td>
                                  <td>'.($order['address'] ? $order['address'] : $user['address']).'</td>
                                  <td>'.($order['phone'] ? $order['phone'] : $user['phone']).'</td>
                                  <td>'.($order['email'] ? $order['email'] : $user['email']).'</td>
                                  <td>'.$status.'</td>
                                  <td>
                                  <a type="button" class="btn mb-2 btn-outline-info" href="user.php?action=detail&id='.$order['id'].'">Xem chi tiết</a>
                                  </td>
                                  <td>
                                    '.($order['status'] == 0 ?'<a data-value="user.php?action=updateStatus&id='.$order['id'].'&status=3" class="btn mb-2 btn-danger updateStatus">Huỷ đơn</a>':"").'
                                    '.($order['status'] == 1 ?'<a data-value="user.php?action=updateStatus&id='.$order['id'].'&status=2" class="btn mb-2 btn-primary updateStatus">Đã nhận hàng</a>':"").'
                                  </td>
                                </tr> 
                                ';
                              }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- Bordered table -->
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/d3.min.js"></script>
    <script src="assets/js/topojson.min.js"></script>
    <script src="assets/js/datamaps.all.min.js"></script>
    <script src="assets/js/datamaps-zoomto.js"></script>
    <script src="assets/js/datamaps.custom.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/gauge.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/apexcharts.min.js"></script>
    <script src="assets/js/apexcharts.custom.js"></script>
    <script src='assets/js/jquery.mask.min.js'></script>
    <script src='assets/js/select2.min.js'></script>
    <script src='assets/js/jquery.steps.min.js'></script>
    <script src='assets/js/jquery.validate.min.js'></script>
    <script src='assets/js/jquery.timepicker.js'></script>
    <script src='assets/js/dropzone.min.js'></script>
    <script src='assets/js/uppy.min.js'></script>
    <script src='assets/js/quill.min.js'></script>
    <script src="assets/js/apps.js"></script>
  <script src="assets/js/sweetalert.min.js"></script>

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

</html>