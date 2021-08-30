<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
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
                        <form action="admin.php?c=p-comment&p=update&id=<?php echo $getcom['id'] ?>" method="POST">

                            <div class="form-group">
                                <label for="description">Ẩn hiện</label>
                                <p>1:Hiện                           
                                </p>
                                <p>2:Ẩn                            
                                </p>
                                <p>3:Đang xử lý                            
                                </p>
                                <input type="text" name="comment" id="comment" class="form-control"
                                    value="<?php echo $getcom['anhien'] ?>">
                            </div>


                            <button type="submit" class="btn btn-block btn-primary" onclick="return ConfirmEdit();">Sửa
                             </button>
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
                ['fontColor', 'hiliteColor', 'outdent', 'indent', 'align', 'horizontalRule', 'list',
                    'table'],
                ['link', 'image', 'video'],
                ['codeView', 'save']
            ],
            lang: SUNEDITOR_LANG['en']
        });

        function saveContent() {
            editor.save();
        }
        </script>

        <script>
        function ConfirmEdit() {
            var x = confirm("Bạn có muốn sửa không ?");
            if (x)
                return true;
            else
                return false;
        }
        </script>
</body>