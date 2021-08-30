<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
        .cont{
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


           <!-- Striped rows -->
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12 my-4">
              <h2 class="h1 mb-1">Danh Mục Thẻ Sản Phẩm</h2>
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
                                <a href='admin.php?c=tag-product&p=insert'
                                    class="btn btn-primary float-right ml-3" type="button">Thêm mới +</a>
                                <button class="btn btn-secondary" type="button" onclick='xoa();'> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-borderless table-hover">
                      <thead>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" onclick="show();" id="all2">
                              <label class="custom-control-label" for="all2"></label>
                            </div>
                          </td>
                          <th>Mã</th>
                          <th>Tên</th>
                        </tr> 
                      </thead>
                      <tbody id="sp"> 
                        <?php
                        $i = 0;
                          foreach($tag as $t){
                            $i++;
                            echo '
                            <tr>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="'.$t['id'].'" name="check_box" id="'.$i.'">
                                    <label class="custom-control-label" for="'.$i.'"></label>
                                  </div>
                                </td><td class="text-muted">'.$t['id'].'</td>
                                </td><td class="text-muted">'.$t['name'].'</td>
                                <td>
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=tag-product&p=form_edit&id='.$t['id'].'">Sửa</a>
                                    <a class="dropdown-item" onclick="xacnhan('.$t['id'].')"">Xóa</a>
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
    <script>
      function xacnhan(z){
        var xoa = document.getElementById('display1');
        var button = document.getElementById('button');
        var thongbao = document.getElementById('thongbao');
        $.ajax({
            url: 'admin.php?c=tag-product&p=xoa',
            type: 'GET',
            data: 'xn=' + z,
            success: function(data) {
                thongbao.innerText = "Bạn có chắc muốn xóa danh mục sản phẩm "+data+" không?"
                xoa.style.display='block'
                button.href = 'admin.php?c=tag-product&p=remove&id='+z
            }
        });
        return false;
    }
    function tat(){
        var xoa = document.getElementById('display1');
        xoa.style.display='none'
    }
      $('#dataTable-1').DataTable(
      {
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

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
    <script>
        $(".btn-primary").on('click', function(){
            $(this).parent().toggleClass("showContent");
        });

        function tim(x) {
            var sanpham = document.getElementById('sp');
            $.ajax({
                url: 'admin.php?c=tag-product&p=search',
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
              url: 'admin.php?c=tag-product&p=chosedelete',
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
    </script>
  </body>