<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }
    
    #loiname,#loianhien{
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
        <div class="col-md-10 my-4 float-right">
            <form action="admin.php?c=tag-blog&t=add" method="POST" onsubmit="return saveContent()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">ID</label>
                    <input type="text" name="id" id="id" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Tên thẻ</label>
                    <input type="text" name="name" id="name" class="form-control mb-2">
                    <span id='loiname' style="color:red;">Vui lòng nhập tên thẻ</span>
                </div>
                
                <div class="form-group">
                    <label for="description">Ẩn hiện</label>
                    <input type="text" name="priority" id="priority" class="form-control mb-2">
                    <span id='loianhien' style="color:red;">Vui lòng nhập (ẩn = 0 hoặc hiện = 1)</span>
                </div>
               

                <button type="submit" class="btn btn-block btn-primary" onclick="return ConfirmAdd();">Đăng thẻ</button>
            </form>

        </div> <!-- Striped rows -->
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
            var ten = document.getElementById("name");
            var anhien = document.getElementById("priority");
            var loiten = document.getElementById("loiname");
            var loianhien = document.getElementById("loianhien");
            hien = 0;
            if (ten.value == '') {
                loiten.style.display = 'block';
                hien = 1;
            }else {
                loiten.style.display = 'none';
            }
            if (anhien.value == '') {
                loianhien.style.display = 'block';
                hien = 1;
            }else if(isNaN(anhien.value) == true){
                loianhien.style.display = 'block';
                loianhien.innerText = 'Vui lòng nhập số';
                hien = 1;
            }else if(anhien.value > 1 || anhien.value < 0){
                loianhien.style.display = 'block';
                loianhien.innerText = 'Vui lòng nhập (ẩn = 0 hoặc hiện = 1)';
                hien = 1;
            }else{
                loianhien.style.display = 'none';
            }
            if(hien == 1){
                return false;
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