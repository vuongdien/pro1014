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
          color:#ced2da;
          background:#323a20;
          border-color: #9bbcff;
          border-radius: 0.25rem;
          box-shadow: 0 0 0 0.2rem rgba(27, 102, 255, 0.25)
        }
        .drag{
          width:100%;
          height:300px;
          overflow:hidden;
          background:black;
        }
        .drag img{
          width:100%;
          height:100%;
          object-fit:cover;
        }
    #account {
        display: block;
    }

        
    #loiphone,
    #loiten,
    #loirank,
    #loitk,
    #loiaddress,
    #loiemail,
    #loiday{
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
                    <div class="col-md-12">
                        <h1 class="h1 mb-2">Sửa Thông Tin Tài Khoản</h1>
                        <div class="card shadow">
                            <div class="card my-2">
                                <form action="admin.php?c=user&p=update&id=<?php echo $user['id']?>" method="post" onsubmit="return batloi();" enctype="multipart/form-data">
                                    <section id="account">
                                        <div class="card shadow mb-2">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <h1 class="h5 mb-2">Ảnh Đại Diện</h1>
                                                        <div style="padding:0px;" class="card-body">
                                                            <div id="khunganh" class="drag mt-3">
                                                              <img id='kanh'  src="<?php echo $user['avartar']?>" alt="">
                                                            </div>
                                                            <input type="file"  class="mt-3" id='hinh' onchange="anh();"
                                                                name="images_sp">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 my-2 ml-5">
                                                        <div class="row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tên tài khoản</label>
                                                            <div class="col-sm-9 ">
                                                                <input type="text" class="form-control mb-2" id="tentk" name="tentk" value="<?php echo $user['username']?>">
                                                                <span id='loitk' style="color:red;">vui lòng nhập tên tài khoản</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Họ và Tên</label>
                                                            <div class="col-sm-9  mb-2">
                                                                <input type="text" class="form-control mb-2" id="ten" name="ten" value="<?php echo $user['fullname']?>">
                                                                <span id='loiten' style="color:red;">vui lòng nhập họ và tên</span>
                                                            </div>
                                                        </div>
                                                        <fieldset class="form-group">
                                                            <div class="row">
                                                                <label class="col-form-label col-sm-3 pt-0">Số điện thoại</label>
                                                                <div class="col-sm-9 mb-2">
                                                                    <input type="text" id="phone" class="form-control mb-2" name="phone" value="<?php echo $user['phone']?>">
                                                                    <span id='loiphone' style="color:red;">vui lòng nhập số điện thoại</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-form-label col-sm-3 pt-0">Email</label>
                                                                <div class="col-sm-9 mb-2">
                                                                    <input type="email" id="email" class="form-control mb-2" name="email" value="<?php echo $user['email']?>">
                                                                    <span id='loiemail' style="color:red;">vui lòng nhập email</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-form-label col-sm-3 pt-0">Ngày sinh</label>
                                                                <div class="col-sm-9 mb-2">
                                                                    <input type="date" id="date" class="form-control mb-2" name="date" value="<?php echo substr($user['birthday'],0, 10)?>">
                                                                    <span id='loiday' style="color:red;">vui lòng nhập ngày sinh</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-form-label col-sm-3 pt-0">Địa chỉ</label>
                                                                <div class="col-sm-9 mb-2">
                                                                    <input type="text" id="address" class="form-control mb-2" name="address" value="<?php echo $user['address']?>">
                                                                    <span id='loiaddress' style="color:red;">vui lòng nhập địa chỉ</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="row">
                                                            <label class="col-sm-3" for="exampleFormControlTextarea1">Cấp bậc</label>
                                                            <div class="col-sm-9 mb-2">
                                                                    <input type="text" id="rank" class="form-control mb-2" name="rank" value="<?php echo $user['rank']?>">
                                                                    <span id='loirank' style="color:red;">vui lòng nhập cấp bậc</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row  float-right">
                                                    <div class="col-sm-2 mb-2 float-right">
                                                        <input type="submit" style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;color:white;" value="Lưu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
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
      //    hinh.src = 'assets/img/user/'+img;
      // }
      function anh() {
        var hinh = document.getElementById('hinh');
        var kanh = document.getElementById('kanh');
        var img = hinh.value;
        img = img.slice(12, img.length)
        kanh.src = "assets/img/user/" + img
        }

      function batloi() {
        var ten = document.getElementById("ten");
        var tentk = document.getElementById("tentk");
        var phone = document.getElementById("phone");
        var address = document.getElementById("address");
        var rank= document.getElementById("rank");
        var date= document.getElementById("date");
        var email = document.getElementById("email");
        var loiten = document.getElementById("loiten");
        var loiemail = document.getElementById("loiemail");
        var loirank = document.getElementById("loirank");
        var loiaddress = document.getElementById("loiaddress");
        var loiday = document.getElementById("loiday");
        var loitentk = document.getElementById("loitk");
        var loiphone = document.getElementById("loiphone");
        hien = 0;
        // if (hinh.src == 'http://localhost/pro1012/assets/img/user/') {
            // loihinh.style.display = 'block';
        //     hien = 1;
        // } else {
            // loihinh.style.display = 'none';
        // }
        if (tentk.value == '') {
            hien = 1;
            loitentk.style.display='block';
        }else {
            loitentk.style.display = 'none';
        }
        if (ten.value == '') {
            hien = 1;
            loiten.style.display = 'block';
        }else {
            loiten.style.display = 'none';
        }
        if (date.value == '') {
            hien = 1;
            loiday.style.display = 'block';
        }else {
            loiday.style.display = 'none';
        }
        if (phone.value == '') {
            hien = 1;
            loiphone.style.display = 'block';
        }else if(isNaN(phone.value) == true){
            hien = 1;
            loiphone.style.display = 'block';
            loiphone.innerText = 'Vui lòng nhập số';
        }else{
            loiphone.style.display = 'none';
        }
        if (address.value == '') {
            hien = 1;
            loiaddress.style.display = 'block';
        }else {
            loiaddress.style.display = 'none';
        }
        if (rank.value == '') {
            hien = 1;
            loirank.style.display = 'block';
        }else if(isNaN(rank.value) == true){
            hien = 1;
            loirank.style.display = 'block';
            loirank.innerText = 'Vui lòng nhập số';
        }else{
            loirank.style.display = 'none';
        }
        if (email.value == '') {
            hien = 1;
            loiemail.style.display = 'block';
            
        }else {
            loiemail.style.display = 'none';
        }
        if(hien == 1){
            return false;
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