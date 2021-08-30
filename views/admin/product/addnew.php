<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }

    .select {
        width: 100%;
        height: 35px;
        color: #ced4da;
        background: #343a40;
        border-color: #9bbcff;
        border-radius: 0.25rem;
        box-shadow: 0 0 0 0.2rem rgba(27, 104, 255, 0.25)
    }

    .drag {
        width: 100%;
        height: 300px;
        background: black;
    }

    .drag img {
        width: 100%;
        height: 100%;
    }

    td {
        width: 35%;
    }

    #account {
        display: block;
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
                        <h1 class="h1 mb-2">Thêm Sản Phẩm</h1>
                        <div class="card shadow">
                            <div class="card my-4">
                                <form action="admin.php?c=product&p=addnew" method="post" onsubmit="return loi()" enctype="multipart/form-data">
                                    <section id="account">
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-md-3 mb-3">
                                                        <h1 class="h5 mb-2 ">Ảnh Sản Phẩm</h1>
                                                        <div style="padding:0px;" class="card-body">
                                                            <div id="khunganh" class="drag mt-3">
                                                            </div>
                                                            <input type="file" style="margin-bottom:5px;" id='hinh'
                                                                onchange="anh();" class="mt-3" name="images_sp">
                                                            <span id='loihinh' style="color:red;">Vui lòng chọn
                                                                ảnh</span>
                                                        </div>
                                                        <div style="padding:0px;" class="card-body">
                                                            <h1 class="h5 mb-2 mt-4">Ảnh Mô Tả</h1>
                                                            <input type="file" name="hinh[]" multiple>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 my-4 ml-5">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tên
                                                                Sản Phẩm</label>
                                                            <div class="col-sm-9 mb-3">
                                                                <input type="text" style="margin-bottom:5px;"
                                                                    class="form-control" id="ten" name="name"
                                                                    placeholder="Tên Sản Phẩm"><span id='loiten'
                                                                    style="color:red;">Vui lòng nhập tên sản phẩm</span>
                                                            </div>
                                                        </div>
                                                        <fieldset class="form-group">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-sm-3 pt-0">Giá</label>
                                                                <div class="col-sm-9 mb-3">
                                                                    <input type="text" id="giag"
                                                                        style="margin-bottom:5px;" class="form-control"
                                                                        name="cost" placeholder="Giá gốc"><span
                                                                        id='loigiag' style="color:red;">Vui lòng nhập
                                                                        giá gốc</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-form-label col-sm-3 pt-0">Giá Thị
                                                                    Trường</label>
                                                                <div class="col-sm-9 mb-3">
                                                                    <input type="text" id="giab"
                                                                        style="margin-bottom:5px;" class="form-control"
                                                                        name="price" placeholder="Giá bán"><span
                                                                        id='loigiab' style="color:red;">Vui lòng nhập
                                                                        giá bán</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3" for="exampleFormControlTextarea1">Mô
                                                                Tả</label>
                                                            <div class="col-sm-9 mb-3">
                                                                <textarea class="form-control" name="description"
                                                                    rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3">
                                                                <label for="exampleFormControlTextarea1">Size từ</label>
                                                                <select class="select" style="margin-bottom:5px;"
                                                                    name="size1" id="minsize">
                                                                    <option value="0">Từ</option>
                                                                    <?php
                                                                     foreach($size as $c){
                                                                      echo '<option value="'.$c['id'].'">'.$c['size'].'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <span id='loisizen' style="color:red;">Vui lòng chọn
                                                                    size</span>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label for="exampleFormControlTextarea1">đến</label>
                                                                <select class="select" style="margin-bottom:5px;"
                                                                    name="size2" id="maxsize">
                                                                    <option value="0">Đến</option>
                                                                    <?php
                                                                      foreach($size as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['size'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                                <span id='loisizel' style="color:red;">Vui lòng chọn
                                                                    size</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-4">
                                                                <label for="exampleFormControlTextarea1">Màu sắc</label>
                                                                <select class="select" style="margin-bottom:5px;"
                                                                    name="color" id="color">
                                                                    <option value="0">Chọn màu sắc</option>
                                                                    <?php
                                                                      foreach($color as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['name'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                                <span id='loimau' style="color:red;">Vui lòng chọn
                                                                    màu</span>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="exampleFormControlTextarea1">Thương
                                                                    Hiệu</label>
                                                                <select class="select" style="margin-bottom:5px;"
                                                                    name="brand" id="brand">
                                                                    <option value="0">Chọn thương hiệu</option>
                                                                    <?php
                                                                      foreach($brand as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['name'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                                <span id='loibrand' style="color:red;">Vui lòng chọn
                                                                    thương hiệu</span>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="exampleFormControlTextarea1">Danh
                                                                    Mục</label>
                                                                <select class="select" style="margin-bottom:5px;"
                                                                    name="tag" id="tag">
                                                                    <option value="0">Chọn danh mục</option>
                                                                    <?php
                                                                      foreach($tag as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['name'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                                <span id='loitag' style="color:red;">Vui lòng chọn danh
                                                                    mục</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row  float-right">
                                                    <div class="col-sm-4 mb-3 float-right">
                                                        <input type="button" onclick="next();"
                                                            style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;color:white;"
                                                            value="Tiếp tục">
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
    var i = 0;

    function anh() {
        if (i == 0) {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var khunganh = document.getElementById('khunganh');
                var img = hinh.value;
                img = img.slice(12, img.length)
                var anh = document.createElement("img")
                anh.src = "assets/img/product/" + img
                var newelement = khunganh.appendChild(anh);
            });
            i = 1;
        } else {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var khunganh = document.getElementById('khunganh').firstElementChild;
                var img = hinh.value;
                img = img.slice(12, img.length)
                khunganh.src = "assets/img/product/" + img;
            });
            i = 1;
        }

    }

    function next() {
        var min = document.getElementById("minsize").value;
        var max = document.getElementById("maxsize").value;
        var profile = document.getElementById("profile");
        var hinh = document.getElementById("hinh");
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
        if (hinh.value == '') {
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
                url: 'admin.php?c=product&p=next',
                type: 'GET',
                data: 'min=' + min + '&max=' + max,
                success: function(data) {
                    account.style.display = 'none';
                    profile.innerHTML = data
                    // alert(data)
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