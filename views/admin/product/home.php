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
        height: 300px;
        background-color: #f5f6fb;
        border-radius: 15px;
    }
    .anh_cm{
        width: 30%;
        height: 155px;
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


        <!-- Striped rows -->
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12 my-4">
                        <h2 class="h1 mb-1">Sản Phẩm</h2>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="toolbar row mb-3">
                                    <div class="col">
                                        <form class="form-inline">
                                            <div class="form-row">
                                                <div class="form-group col-auto">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <input type="search" class="form-control" onkeyup="tim(this.value);"
                                                        id="search" placeholder="Search">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col ml-auto">
                                        <div class="dropdown float-right">
                                            <a href='admin.php?c=product&p=insert'
                                                class="btn btn-primary float-right ml-3" type="button">Thêm mới +</a>
                                            <button class="btn btn-secondary" type="button" onclick='xoa();'> Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- table -->
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" onclick="show();"
                                                        class="custom-control-input" id="all2">
                                                    <label class="custom-control-label" for="all2"></label>
                                                </div>
                                            </td>
                                            <th>Mã SP</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Giá gốc</th>
                                            <th>Giá khuyến mãi</th>
                                            <th>Mô tả</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id='sp'>
                                        <?php
                                        $id = 0;
                                          foreach($product as $p){
                                            $id++;
                                            $description = substr(trim($p['description'],'"'),0,100);
                                            echo '
                                              <tr>
                                                <td>
                                                  <div class="custom-control custom-checkbox check_box">
                                                    <input type="checkbox" class="custom-control-input" name="check_box" value="'.$p['id'].'" id="'.$id.'">
                                                    <label class="custom-control-label" for="'.$id.'"></label>
                                                  </div>
                                                </td><td class="text-muted">'.$p['id'].'</td>
                                                <td>
                                                  <div class="avatar avatar-md">
                                                    <img src="'.$p['thumb'].'" alt="..." class="avatar-img rounded-circle">
                                                  </div>
                                                </td>
                                                <td>
                                                  <p class="mb-0 text-muted"><strong>'.$p['name'].'</strong></p>
                                                </td>
                                                <td class="text-muted">'.$p['update'].'</td>
                                                <td class="text-muted">'.numToMoney($p['cost']).'</td>
                                                <td class="text-muted">'.numToMoney($p['price']).'</td>
                                                <td style = "width:33%;" class="text-muted">'.$description.'</td>
                                                <td>
                                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                  </button>
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="admin.php?c=product&p=form_edit&id='.$p['id'].'">Sửa</a>
                                                    <a class="dropdown-item" onclick="xacnhan('.$p['id'].')">Xóa</a>
                                                    <a class="dropdown-item" href="admin.php?c=product&p=detail&id='.$p['id'].'">Chi tiết</a>
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
                    </div> <!-- customized table -->
                </div>
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <div class="display1" id="display1">
        <div class="boxdn1">
            <div class="happy">
                <div class="anh_cm">
                    <img id="anh_cm" src="" alt="">
                </div>
                <div class="text_cm">
                    <h4 style="text-align: center;margin-bottom:20px;" id="thongbao"></h4>
                    <button style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;margin-left:44px;float:left;color:white;" onclick="tat();">Hủy</button>
                    <button style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;margin-left:61px;"><a id="button" href="" style="color:white;" >Xóa</a></button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/apps.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
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

    function tim(x) {
        var sanpham = document.getElementById('sp');
        $.ajax({
            url: 'admin.php?c=product&p=search',
            type: 'GET',
            data: 'content=' + x,
            success: function(data) {
                sanpham.innerHTML = data;
            }
        });
        return false;
    }

    function xoa() {
        var sanpham = document.getElementById('sp');
        var box = document.getElementsByName('check_box');
        var check = [];
        for (var i = 0; i < box.length; i++) {
            if (box[i].checked === true) {
                check += ',' + box[i].value;
            }
        }
        $.ajax({
            url: 'admin.php?c=product&p=chosedelete',
            type: 'GET',
            data: 'delete=' + check,
            success: function(data) {
                sanpham.innerHTML = data;
            }
        });
        return false;
    }

    function show() {
        var show = document.getElementById('all2');
        var box = document.getElementsByName('check_box');
        if (show.checked === true) {
            for (var i = 0; i < box.length; i++) {
                box[i].checked = true;
            }
        } else if (show.checked === false) {
            for (var i = 0; i < box.length; i++) {
                box[i].checked = false;
            }
        }
    }
    function xacnhan(z){
        var xoa = document.getElementById('display1');
        var anh_cm = document.getElementById('anh_cm');
        var button = document.getElementById('button');
        var thongbao = document.getElementById('thongbao');
        $.ajax({
            url: 'admin.php?c=product&p=xoa',
            type: 'GET',
            data: 'xn=' + z,
            success: function(data) {
                var chuoi = data.split(',',2)
                anh_cm.src = chuoi[0];
                thongbao.innerText = "Bạn có chắc muốn xóa sản phẩm này không?"
                xoa.style.display='block'
                button.href = 'admin.php?c=product&p=remove&id='+z
            }
        });
        return false;
    }
    function tat(){
        var xoa = document.getElementById('display1');
        xoa.style.display='none'
    }
    </script>
</body>