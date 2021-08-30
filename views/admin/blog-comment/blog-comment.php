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
                        <div class="card shadow">
                            <div class="card-body">
                                <h2 class="card-title">Bình luận</h2>
                                <div class="toolbar row mb-3">
                                    <!-- <div class="col">
                            <div class="dropdown">
                                <a class="btn btn-primary" href="admin.php?c=tag-blog&t=create">Thêm thẻ +</a>
                            </div>
                        </div> -->
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="chall">
                                                    <label class="custom-control-label" for="d1"></label>
                                                </div>
                                            </th>
                                            <th>Mã </th>
                                            <th>Mã tin tức </th>
                                            <th>Mã người đăng</th>
                                            <th>Bình luận</th>
                                            <th>Khởi tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                 $comment= getAllBlogComment();
                                 foreach($comment as $coms){
                                 
                                    echo'
                                    <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="d1">
                                        <label class="custom-control-label" for="d1"></label>
                                      </div>
                                    </td>
                                    <td>'.$coms['id'].'</td>
                                    
                                    <td>'.$coms['blog_id'].'</td>
                                    <td >'.$coms['user_id'].'</td>
                                    <td >'.$coms['content'].'</td>
                                    <td >'.$coms['created'].'</td>

                                    
                                    
                                    <td>
                                      <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                          <a class="dropdown-item" href="admin.php?c=b-comment&b=edit&id='.$coms['id'].'">Sửa</a>
                                          <a class="dropdown-item" href="admin.php?c=b-comment&b=delete&id='.$coms['id'].'" onclick="return ConfirmDelete();">Xóa</a>
                                        </div>
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
        </script>
        <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có muốn xóa không ?");
            if (x)
                return true;
            else
                return false;
        }
        </script>
</body>