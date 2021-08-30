<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
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
    <style>
    .valid {
        color: green;
    }
    </style>
</head>

<body class="dark ">
    <div class="wrapper vh-100 container">
        <div class="row align-items-center h-100">
            <form class="col-lg-6 col-md-8 col-10 mx-auto" method="POST" id="registerForm"
                action="account.php?action=toRegister" onsubmit="submitForm(event)">

                <div class="mx-auto text-center my-4">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.php">
                        <img src="./assets/img/logo-white.png" alt="">
                    </a>
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <img src="./assetss/img/logo-white.png" alt="">
                    </a>
                    <h2 class="my-3">Đăng ký</h2>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Tên tài khoản</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Họ và tên</label>
                    <input type="text" class="form-control" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <hr class="my-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword5">Mật khẩu</label>
                            <input type="password" class="form-control" id="psw" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="cf-psw" name="confirm-password" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Yêu cầu mật khẩu</p>
                        <p class="small text-muted mb-2"> Để tạo tải khoản, bạn cần phải thỏa mãn những yêu cầu sau:
                        </p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li id="length" class="invalid">Mật khẩu ít nhất 8 ký tự</li>
                            <li id="capital" class="invalid">Có ít nhất 1 chữ in HOA</li>
                            <li id="number" class="invalid">Có ít nhất 1 chữ số</li>
                            <li id="confirm">Xác nhận mật khẩu phải giống với mật khẩu</li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnSubmit">Tạo tài khoản</button>
                <a class="btn btn-lg btn-secondary btn-block" href="account.php">Đăng nhập</a>
                <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
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
    var myInput = document.getElementById("psw");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var confirm = document.getElementById("confirm");
    var cfpsw = document.getElementById("cf-psw");
    var flag = false;

    cfpsw.onkeyup = function() {
        if (myInput.value == cfpsw.value) {
            confirm.classList.remove("invalid");
            confirm.classList.add("valid");
            flag = true;
        } else {
            confirm.classList.remove("valid");
            confirm.classList.add("invalid");
            flag = false;
        }
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
            flag = true;
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
            flag = false;
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
            flag = true;
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
            flag = false;
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
            flag = false;
        }
    }

    function submitForm(event) {
        var upperCaseLetters = /[A-Z]/g;
        var numbers = /[0-9]/g;
        if (myInput.value == cfpsw.value && myInput.value.match(upperCaseLetters) && myInput.value.match(numbers) &&
            myInput.value.length >= 8) {

        } else {
            event.preventDefault();
            console.log('error');
        }
    }
    $("#registerForm").submit(function(e) {

        
      $("#btnSubmit").prop( "disabled", true );
        e.preventDefault();

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
                    $("#registerForm")[0].reset();
                    swal({
                      title: data.title,
                      text:  data.message,
                      icon: "success",
                      closeOnClickOutside: false,
                    });
                } else {
                    swal({
                      title: data.title,
                      text:  data.message,
                      icon: "error",
                      closeOnClickOutside: false,
                    });
                }
                $("#btnSubmit").prop( "disabled", false );
            }
        });


    });
    </script>
</body>

</html>
</body>

</html>