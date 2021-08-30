<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Login</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="assets/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="assets/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="assets/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="assets/css/app-dark.css" id="darkTheme">
</head>

<body class="dark ">
    <div class="wrapper vh-100 container">
        <div class="row align-items-center h-100">
            <form id="loginForm" class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST"
                action="account.php?action=toLogin">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.php">
                    <img src="./assets/img/logo-white.png" alt="">
                </a>
                <h1 class="h4 mb-3">Đăng nhập</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Tên tài khoản </label>
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Tên tài khoản "
                        required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Mật khẩu</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Mật khẩu"
                        required="">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
                <a class="btn btn-lg btn-secondary btn-block" href="account.php?action=register">Đăng ký</a>
                <p class="mt-5 mb-3 text-muted">© 2020</p>
            </form>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/apps.js"></script>
    <script>
    $("#loginForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(response) {
              console.log(response);
                let data = JSON.parse(response);
                if (data.status == 200) {
                    window.location = 'home.php';
                } else {
                  swal(data.title, data.message, "error");
                }
            }
        });


    });
    </script>
</body>

</html>
</body>

</html>