<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }
    .card img{
        width: 100%;
    }
    #rw{
        display: none;
    }
    #loititle,#loidescription,#loitag,#loihinh,#loihinh,#loicontent{
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
            <form action="admin.php?c=blog&a=add" onsubmit="return saveContent()" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tiêu đề bài viết:</label>
                    <input type="text" name="title" id="title" class="form-control mb-2">
                    <span id='loititle' style="color:red;">Vui lòng nhập tiêu đề bài viết</span>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả bài viết:</label>
                    <input type="text" name="description" id="description" class="form-control mb-2">
                    <span id='loidescription' style="color:red;">Vui lòng nhập mô tả bài viết</span>
                </div>
                <div class="form-group">
                    <label for="description">Gắn thẻ bài viết:</label>
                        <a href="#" class=" d-inline float-right">Thêm thẻ +</a>
                    <div class="card shadow mb-2">
                        <div class="card-body ">
                            <div class="row px-2 ">
                                <?php
                                    foreach ($tags as $tag) {
                                        echo '
                                        <div class="col-4 col-md-2 custom-control custom-checkbox">
                                            <input type="checkbox" class="check custom-control-input" id="tag-'.$tag['id'].'" name="tag[]" value="'.$tag['id'].'">
                                            <label class="custom-control-label" for="tag-'.$tag['id'].'">'.$tag['name'].'</label>
                                        </div>
                                    ';
                                    }
                                ?>
                            </div>
                        </div> <!-- / .card-body -->
                    </div>
                    <span id='loitag' style="color:red;">Vui lòng chọn thẻ</span>
                </div>
                <div class="form-group">
                    <label for="customFile">Ảnh đại diện:</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="thumb">Chọn hình ảnh</label>
                        <input type="file" class="custom-file-input mb-2" id="hinh" name="thumb" onchange="anh();">
                        <span id='loihinh' style="color:red;">Vui lòng chọn ảnh</span>
                    </div>
                </div>
                <div id="rw" class="row my-4">
                    <div id="khunganh" class="card border-0 bg-transparent col-3" style="height:250px ; width:300px">
                        <!-- <img src="assets/assets/products/p4.jpg" alt="..." class="card-img-top img-fluid rounded">
                            <a href="">Xoa hinh anh</a> -->
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="content">Nội dung bài viết:</label>
                    <textarea id="content" name="content" class="w-100" style="height: 300px"></textarea>
                    <style>
                    #suneditor_content {
                        width: unset !important;
                    }
                    </style>
                </div>
                <span id='loicontent' style="color:red;">Vui lòng nhập nội dung bài viết</span>

                <button type="submit" class="btn btn-block btn-primary mt-3"  onclick="return ConfirmAdd();">Đăng bài viết</button>
            </form>

        </div> <!-- Striped rows -->

        </div>
            </div>
        </main>


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
        const editor = SUNEDITOR.create((document.getElementById('content') || 'content'), {
            buttonList: [
                ['undo', 'redo', 'font', 'fontSize', 'formatBlock'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'removeFormat'],
                ['fontColor', 'hiliteColor', 'outdent', 'indent', 'align', 'horizontalRule', 'list', 'table'],
                ['link', 'image', 'video'],
                ['codeView','save']
            ],
            lang: SUNEDITOR_LANG['en']
        });
        function saveContent(){
            editor.save()
            var loititle = document.getElementById("loititle");
            var loidescription = document.getElementById("loidescription");
            var loitag = document.getElementById("loitag");
            var loihinh = document.getElementById("loihinh");
            var loicontent = document.getElementById("loicontent");
            var title = document.getElementById("title");
            var content = document.getElementById("content");
            var hinh = document.getElementById("hinh");
            var description = document.getElementById("description");
            var tag = document.getElementsByClassName('check');
            var hien = 0;
            var check = 0;
        if (title.value == '') {
            loititle.style.display = 'block';
            hien = 1;
        }else{
            loititle.style.display = 'none';
        }
        if(description.value == ''){
            loidescription.style.display = 'block';
            hien = 1;
        }else {
            loidescription.style.display = 'none';
        }
        for(var i = 0;i<tag.length;i++){
            if(tag[i].checked === true){
               check = 1;
            }
        }
        if(check == 0){
            loitag.style.display = 'block';
            hien = 1;
        }else{
            loitag.style.display = 'none';
        }
        if (hinh.value == '') {
            loihinh.style.display = 'block';
            hien = 1;
        }else {
            loihinh.style.display = 'none';
        }
        if (content.value == '<p><br></p>') {
            loicontent.style.display = 'block';
            loicontent.innerText = "Vui lòng nhập nội dung bài viết"
            hien = 1;
        }else if(content.value.length < 30){
            loicontent.style.display = 'block';
            loicontent.innerText = "Vui lòng nhập ít nhất 30 ký tự"
            hien = 1;
        }else{
            loicontent.style.display = 'none';
        }
        if(hien == 1){
            return false;
        }
    }
        var i=0;
        function anh() {
        if (i == 0) {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var khunganh = document.getElementById('khunganh');
                var r = document.getElementById('rw');
                r.style.display="block"
                var img = hinh.value;
                img = img.slice(12, img.length)
                var anh = document.createElement("img")
                anh.src = "assets/img/blog/" + img
                var newelement = khunganh.appendChild(anh);
            });
            i = 1;
        }else {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var r = document.getElementById('rw');
                var khunganh = document.getElementById('khunganh').firstElementChild;
                r.style.display="block"
                var img = hinh.value;
                img = img.slice(12, img.length)
                khunganh.src = "assets/img/blog/" + img;
            });
            i = 1;
        }

    }

        </script>

<script>
            function ConfirmAdd()
    {
      var x = confirm("Bạn có muốn thêm không ?");
      if (x)
          return true;
      else
        return false;
    }
        </script>
</body>