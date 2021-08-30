<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
        .cont{
            height: 100px;
            overflow: hidden;
        }
        .select{
          width:100%;
          height:35px;
          color:#ced4da;
          background:#343a40;
          border-color: #9bbcff;
          border-radius: 0.25rem;
          box-shadow: 0 0 0 0.2rem rgba(27, 104, 255, 0.25)
        }
        .drag{
          width:100%;
          height:300px;
          background:black;
        }
        .drag img{
          width:100%;
          height:100%;
        }
        #loiten,#loianhien{
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
            <div class="col-md-10">
              <h1 class="h1 mb-2">Thêm Nhãn Hàng</h1>
                <div class="card shadow">
                  <div class="card-body">
                        <div class="card shadow mb-4">
                          <div class="card-body">
                            <form action="admin.php?c=brand&a=add" onsubmit="return loi()" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                  <div class="col-sm-4">
                                    <label class="col-form-label col-sm-6 pt-0">Tên nhãn hàng</label>
                                    <div class="col-md-12">
                                      <input type="text" style="margin-bottom:10px;width:260px;" class="form-control" name="name" id="ten" placeholder="Tên nhãn hàng"></div>
                                      <div style="width:100%;height:20px;" class="loi">
                                          <span id='loiten' style="color:red;margin-left: 20px;">Vui lòng nhập tên nhãn hàng</span>
                                      </div>
                                    </div>
                                  <div class="col-sm-5">
                                    <label class="col-form-label col-sm-6 pt-0">Ẩn hiện</label>
                                    <div class="col-md-12">
                                      <input type="text" style="margin-bottom:10px;width:260px;" class="form-control" id="anhien" name="show" placeholder="Ẩn hiện">
                                      <div style="width:100%;height:20px;" class="loi">
                                      <span id='loianhien' style="color:red;">Vui lòng nhập (ẩn = 0 hoặc hiện = 1)</span>
                                      </div>
                                    </div>
                                  </div>
                                <div class="form-group mt-2 ml-5">
                                  <button type="submit" style='width:100px;float:right;margin-top:20px;' class="btn btn-primary">Lưu</button>
                                </div>
                              </div>
                              </div>
                            </form>
                          </div>
                        </div>
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
    <script src='assets/js/jquery.mask.min.js'></script>
    <script src='assets/js/select2.min.js'></script>
    <script src='assets/js/jquery.steps.min.js'></script>
    <script src='assets/js/jquery.validate.min.js'></script>
    <script src='assets/js/jquery.timepicker.js'></script>
    <script src='assets/js/dropzone.min.js'></script>
    <script src='assets/js/uppy.min.js'></script>
     <script src='assets/js/quill.min.js'></script>    
    <script src="assets/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      // function a(){
      //    var anh = document.getElementById('anh');
      //    var hinh = document.getElementById('hinh');
      //    var img = anh.value; 
      //    img = img.slice(13,img.length)
      //    hinh.src = 'assets/img/product/'+img;
      // }
      function loi() {
        var ten = document.getElementById("ten");
        var anhien = document.getElementById("anhien");
        var loiten = document.getElementById("loiten");
        var loianhien = document.getElementById("loianhien");
        hien = 0;
        if (ten.value == '') {
            loiten.style.display = 'block';
            return false
        }else {
            loiten.style.display = 'none';
        }
        if (anhien.value == '') {
            loianhien.style.display = 'block';
            return false
        }else if(isNaN(anhien.value) == true){
            loianhien.style.display = 'block';
            loianhien.innerText = 'Vui lòng nhập số';
            return false
        }else if(anhien.value > 1 || anhien.value < 0){
            loianhien.style.display = 'block';
            loianhien.innerText = 'Vui lòng nhập (ẩn = 0 hoặc hiện = 1)';
            return false
        }else{
            loianhien.style.display = 'none';
        }
      }
    </script>
    <script>
      $('.file-upload').file_upload();
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

    </script>
  </body>
