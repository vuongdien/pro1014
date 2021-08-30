<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
        .cont{
            height : 100px;
            overflow : hidden;
        }
        .select{
          width :100%;
          height :35px;
          color :#ced4da;
          background :#343a40;
          border-color : #9bbcff;
          border-radius : 0.25rem;
          box-shadow : 0 0 0 0.2rem rgba(27, 104, 255, 0.25)
        }
        .drag{
          width :100%;
          height :300px;
          overflow :hidden;
          background :black;
        }
        .drag img{
          width :100%;
          height :100%;
          object-fit :cover;
        }
    #account {
        display : block;
    }
    label{
        font-size : 16px;
        width:150px;
    }
    strong{
        color : #EEEEEE;
        font-size : 17px;
        font-weight: 300;
    }
        
    #loihinh,
    #loiten,
    #loigiab,
    #loigiag,
    #loisizen,
    #loisizel,
    #loitag,
    #loibrand,
    #loimau,
    .loisl1,
    .loisl2 {
        display : none;
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
                    <div class="col-md-12">
                        <h1 class="h1 mb-2">Thông tin Sản Phẩm</h1>
                        <div class="card shadow">
                            <div class="card my-3">
                                <form action="admin.php?c=product&p=edit&id=<?php echo $product['id'];?>" method="post" onsubmit="return loi()" enctype="multipart/form-data">
                                    <section id="account">
                                        <div class="card shadow mb-4">
                                            <div class="card-body ml-4">
                                                <div class="form-group row">
                                                    <div class="col-md-3 mr-2">
                                                        <h1 class="h5 mb-2">Ảnh Sản Phẩm</h1>
                                                        <div style="padding :0px;" class="card-body">
                                                            <div id="khunganh" class="drag mt-3">
                                                              <img id='kanh'  src="<?php echo $product['thumb']?>" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 ml-5 mt-4">
                                                        <fieldset class="form-group">
                                                            <div class="row mb-2">
                                                                <label>Mã sản phẩm :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php echo $product['id']?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Tên
                                                                    Sản Phẩm :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php echo $product['name']?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Giá gốc :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php echo $product['cost']?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Giá Thị Trường :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php echo $product['price']?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Thương hiệu :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php echo $brand['name']?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Màu sắc :</label>
                                                                <div  class="col-sm-9">
                                                                    <strong style="color:<?php echo $color['colorCode']?>;"><?php echo $color['name']?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Danh mục :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php echo $product_tag['name']?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Kích thước giày :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php $size = ''; for($i=$size_id['min'];$i<$size_id['max'];$i++){
                                                                        $size .= $i.',';} echo $size;?></strong>
                                                                </div>
                                                            </div><div class="row mb-2">
                                                                <label>Tổng số lượng :</label>
                                                                <div class="col-sm-9">
                                                                    <strong><?php $soluong = 0;  foreach($product_detail as $s){
                                                                        $soluong += $s['quantity'];} echo $soluong;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <label>Mô Tả</label>
                                                                <div class="col-sm-9">
                                                                <strong><?php echo $product['description']?></strong>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="profile"></section>
                                </form>
                            </div> <!-- .card -->
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
    <script src="https ://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <script async src="https ://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https ://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      // function a(){
      //    var anh = document.getElementById('anh');
      //    var hinh = document.getElementById('hinh');
      //    var img = anh.value; 
      //    img = img.slice(13,img.length)
      //    hinh.src = 'assets/img/product/'+img;
      // }
      function anh() {
        var hinh = document.getElementById('hinh');
        var kanh = document.getElementById('kanh');
        var img = hinh.value;
        img = img.slice(12, img.length)
        kanh.src = "assets/img/product/" + img
        }

      function next(z) {
        var min = document.getElementById("minsize").value;
        var max = document.getElementById("maxsize").value;
        var profile = document.getElementById("profile");        
        var hinh = document.getElementById('kanh');
        var ten = document.getElementById("ten");
        var giag = document.getElementById("giag");
        var giab = document.getElementById("giab");
        var minsize = document.getElementById("minsize");
        var maxsize = document.getElementById("maxsize");
        var color = document.getElementById("color");
        var brand = document.getElementById("brand");
        var tag = document.getElementById("tag");
        var loihinh = document.getElementById("loihinh");
        var loiten = document.getElementById("loiten");
        var loigiag = document.getElementById("loigiag");
        var loigiab = document.getElementById("loigiab");
        var loisizen = document.getElementById("loisizen");
        var loisizel = document.getElementById("loisizel");
        var loimau = document.getElementById("loimau");
        var loibrand = document.getElementById("loibrand");
        var loitag = document.getElementById("loitag");
        hien = 0;
        if (hinh.src == 'http ://localhost/pro1014/assets/img/product/') {
            loihinh.style.display = 'block';
            hien = 1;
        } else {
            loihinh.style.display = 'none';
        }
        if (ten.value == '') {
            loiten.style.display = 'block';
            hien = 1;
        }else {
            loiten.style.display = 'none';
        }
        if (giab.value == '') {
            loigiab.style.display = 'block';
            hien = 1;
        }else if(isNaN(giab.value) == true){
            loigiab.style.display = 'block';
            loigiab.innerText = 'Vui lòng nhập số';
        }else if(Number(giag.value) < Number(giab.value)){
            loigiab.style.display = 'block';
            loigiab.innerText = 'Vui lòng nhập giá thị trường nhỏ hơn giá gốc';
            hien = 1;
        }else{
            loigiab.style.display = 'none';
        }
        if (giag.value == '') {
            loigiag.style.display = 'block';
            hien = 1;
        }else if(isNaN(giag.value) == true){
            loigiag.style.display = 'block';
            loigiag.innerText = 'Vui lòng nhập số';
        }else {
            loigiag.style.display = 'none';
        }
        if (minsize.value == 0) {
            loisizen.style.display = 'block';
            hien = 1;
        } else {
            loisizen.style.display = 'none';
        }
        if (maxsize.value == 0) {
            loisizel.style.display = 'block';
            hien = 1;
        } else {
            loisizel.style.display = 'none';
        }
        if (color.value == 0) {
            loimau.style.display = 'block';
            hien = 1;
        } else {
            loimau.style.display = 'none';
        }
        if (tag.value == 0) {
            loitag.style.display = 'block';
            hien = 1;
        } else {
            loitag.style.display = 'none';
        }
        if (brand.value == 0) {
            loibrand.style.display = 'block';
            hien = 1;
        } else {
            loibrand.style.display = 'none';
        }
        if(minsize.value > maxsize.value){
            loisizen.style.display = 'block';
            loisizen.innerText = 'Vui lòng chọn size nhỏ';
            loisizel.style.display = 'block';
            loisizel.innerText = 'Vui lòng chọn size lớn';
            hien = 1;
        }
        if (hien == 0) {
            $.ajax({
                url : 'admin.php?c=product&p=next',
                type : 'GET',
                data : 'min=' + min + '&max=' + max+'&id='+z,
                success : function(data) {
                    account.style.display = 'none';
                    profile.innerHTML = data
                }
            });
            return false;
        }
    }

    function loi() {
        var loisl1 = document.getElementsByClassName("loisl1");
        var loisl2 = document.getElementsByClassName("loisl2");
        var soluong = document.getElementsByClassName("soluong");
        for(var i =0;i<soluong.length;i++){
            if(soluong[i].value == ''){
                loisl1[i].style.display='block';
                loisl2[i].style.display='none';
                return false
            }else if(soluong[i].value == 0){
                loisl1[i].style.display='none';
                loisl2[i].style.display='block';
                return false
            }else if(isNaN(soluong[i].value) == true){
                loisl1[i].style.display='none';
                loisl2[i].style.display='block';
                loisl2[i].innerText = 'Vui lòng nhập số';
                return false
            }else{
                loisl1[i].style.display='none';
                loisl2[i].style.display='none';
            }
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