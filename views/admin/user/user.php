<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }
        .boxdn1{
        background-color: rgba(0, 0, 0, 0.53);
        position: fixed;
        overflow-y: scroll;
        z-index: 1000;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        }
        .boxdk{
        width: 40%;
        margin: 0 auto;
        margin-top: 70px;
        height: 500px;
        background-color: white;
        position: relative;
        }
        .happy{
            width: 35%;
            margin: 0 auto;
            margin-top: 100px;
            height: 220px;
            background-color: #f5f6fb;
            border-radius: 15px;
        }
        .anh_cm{
            width: 94%;
            height: 200PX;
            margin: 0 auto;
            overflow: hidden;
            padding-top: 29px;
        }
        .anh_cm img{
            width: 100%;
            height: 100%;
        }
        .text_cm{
            width: 71%;
            margin: 0 auto;
            margin-top: 20px;
        }
        .text_cm h4{
            color:#6c757d;
        }
        .text_cm a:hover{
            text-decoration: none;
        }
        #display1{
            display: none;
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
                                <h3 class="card-title">Danh sách tài khoản</h3>
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
                                            <th>Mã</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Tên tài khoản</th>
                                            <th>Họ tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Cấp bậc</th>
                                            <th>Ngày tạo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                  $user=getAllUser();
                                  foreach($user as $u){     
                                    echo'
                                    
                                    <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="d1">
                                        <label class="custom-control-label" for="d1"></label>
                                      </div>
                                    </td>
                                    <td>'.$u['id'].'</td>
                                    <td><img style=" width: 70px;" src="'.$u['avartar'].'" alt=""></td>
                                    <td>'.$u['username'].'</td>
                                    <td>'.$u['fullname'].'</td>
                                    <td>'.$u['phone'].'</td>
                                    <td>'.$u['email'].'</td>
                                    <td>'.$u['rank'].'</td>
                                    <td>'.$u['created'].'</td>
                                    </td>
                                   
                                    <td>
                                      <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                          <a class="dropdown-item" href="admin.php?c=user&p=form_edit&id='.$u['id'].'">Sửa</a>
                                          <a class="dropdown-item"  onclick="xacnhan('.$u['id'].');">Xóa</a>
                                        </div>
                                      </div>
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
        <div class="display1" id="display1">
        <div class="boxdn1">
            <div class="happy">
                <div class="anh_cm">
                    <div class="text_cm">
                        <h4 style="text-align: center;margin-bottom:20px;" id="thongbao"></h4>
                        <button style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;margin-left:44px;float:left;color:white;" onclick="tat();">Hủy</button>
                        <button style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;margin-left:61px;"><a id="button" href="" style="color:white;" >Xóa</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <script>
            function xacnhan(z){
                var xoa = document.getElementById('display1');
                var button = document.getElementById('button');
                var thongbao = document.getElementById('thongbao');
                $.ajax({
                    url: 'admin.php?c=user&p=xoa',
                    type: 'GET',
                    data: 'xn=' + z,
                    success: function(data) {
                        thongbao.innerText = "Bạn có chắc muốn xóa tài khoản tên "+data+" không?"
                        xoa.style.display='block'
                        button.href = 'admin.php?c=user&p=delete&id='+z
                    }
                });
                return false;
            }
            function tat(){
                var xoa = document.getElementById('display1');
                xoa.style.display='none'
            }
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
        </script>
        <script src="assets/js/apps.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
        </script>
        <script>
        $(".btn-primary").on('click', function() {
            $(this).parent().toggleClass("showContent");
        });
        </script>
</body>