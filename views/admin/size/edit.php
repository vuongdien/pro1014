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
        #loiid,#loisize{
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
              <h1 class="h1 mb-2">Sửa Size Giày</h1>
                <div class="card shadow">
                  <div class="card-body">
                        <div class="card shadow mb-4">
                          <div class="card-body">
                            <form action="admin.php?c=size&p=edit&id=<?php echo $size['id']?>" onsubmit="return loi()" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                  <div class="col-sm-4">
                                    <label class="col-form-label col-sm-6 pt-0">Mã</label>
                                    <div class="col-md-12">
                                      <input type="text" style="margin-bottom:10px;width:260px;" class="form-control" name="id" id="id" value="<?php echo $size['id']?>"></div>
                                      <div style="width:100%;height:20px;" class="loi">
                                          <span id='loiid' style="color:red;margin-left: 20px;">Vui lòng nhập mã bằng với giá trị size</span>
                                      </div>
                                    </div>
                                  <div class="col-sm-5">
                                    <label class="col-form-label col-sm-6 pt-0">Size</label>
                                    <div class="col-md-12">
                                      <input type="text" style="margin-bottom:10px;width:260px;" class="form-control" id="size" name="size" value="<?php echo $size['id']?>">
                                      <div style="width:100%;height:20px;" class="loi">
                                      <span id='loisize' style="color:red;">Vui lòng nhập size</span>
                                      </div>
                                    </div>
                                  </div>
                                <div class="form-group mt-2 ml-5">
                                  <button type="submit" style='width:100px;float:right;margin-top:20px;' onclick="ajax();" class="btn btn-primary">Lưu</button>
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

      function ajax(){
        var size = document.getElementById("size");
        $.ajax({
            url: 'admin.php?c=size&p=ktsize',
            type: 'GET',
            data: 'size=' + size.value,
            success: function(data){
                var chuoi = data.split(',',2)
                loi(chuoi[0],chuoi[1])
            }
        });
      }
      function loi(chuoi0,chuoi1){
        var id = document.getElementById("id");
        var size = document.getElementById("size");
        var loiid = document.getElementById("loiid");
        var loisize = document.getElementById("loisize");
        hien = 0;
        if (size.value == '') {
            loisize.style.display = 'block';
            hien = 1;
            loiid.style.display = 'none';
        }else if(isNaN(size.value) == true){
            hien = 1;
            loisize.style.display = 'block';
            loiid.style.display = 'none';
            loisize.innerText = 'Vui lòng nhập số';
        }else if(chuoi0 == 1){
            loisize.style.display = 'block'
            hien = 1;
            loiid.style.display = 'none';
            loisize.innerText = "Size đã tồn tại"
        }else{
            loisize.style.display = 'none'
            if (id.value.length > 0) {
                if(isNaN(id.value) == true){
                    hien = 1;
                    loiid.style.display = 'block';
                    loiid.innerText = 'Vui lòng nhập số';
                }else{
                    if(id.value === size.value){
                        loiid.style.display = 'none';
                    }else{
                        loiid.style.display = 'block';
                        hien = 1;
                    }
                }
            }else{
                if(size.value == chuoi1){
                    loiid.style.display = 'none';
                }else{
                    hien = 1;
                    loiid.style.display = 'block';
                }
            }
        }
        if(hien == 1){
            return false;
        }
      }
    </script>
    <script>
        $(".btn-primary").on('click', function(){
            $(this).parent().toggleClass("showContent");
        });

    </script>
  </body>