<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    session_start();

    // Require các file cần sử dụng.
    require_once('core/function.php');

    // Các Model cần thiết.
    require_once('models/UserModel.php');

    // GET action.
    $action = "login";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'login':
            if(isset($_SESSION['user'])){
                header('location: index.php');
            }
            require_once('views/account/login.php');
            break;
        case 'register':
            if(isset($_SESSION['user'])){
                header('location: index.php');
            }
            require_once('views/account/register.php');
            break;
        case 'signout':
            if(!isset($_SESSION['user'])){
                header('location: index.php');
            }
            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
                header('location: index.php');
            }
            break;
        case 'toLogin':
            if(!isset($_POST['username'])){
                header('location: index.php');
            }
            $user = $_POST['username'];
            $pass = $_POST['password'];

            if(checkUsername($user)){
                $hash = getUserByUsername($user)['password'];
                if(password_verify($pass, $hash)){
                    $id = getUserByUsername($user)['id'];
                    if(getUserById($id)['rank'] > 0){
                        $_SESSION['user']['id'] = $id;
                        $_SESSION['user']['rank'] = getUserByUsername($user)['rank'];
                        $return = array(
                            'status' => 200,
                            'message' => "Login Successful."
                        );
                    }else{
                        $return = array(
                            'status' => 204,
                            'title' => "Tài khoản chưa được xác minh!",
                            'message' => "Vui lòng kiểm tra email đăng ký."
                        );
                    }
                }
                else{
                    $return = array(
                        'status' => 204,
                        'title' => "Sai mật khẩu!",
                        'message' => "Vui lòng kiểm tra lại mật khẩu của bạn."
                    );
                }
            }else{
                $return = array(
                    'status' => 204,
                    'title' => "Sai tên tài khoản!",
                    'message' => "Vui lòng kiểm tra lại tên tài khoản của bạn."
                );
            }
            print_r(json_encode($return));
            die();
            break;
        case 'toRegister':
            if(!isset($_POST['username'])){
                header('location: index.php');
            }
            $user = $_POST['username'];
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $avartar = 'assets/img/user/noavt.jpg';
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $return = array(
                    'status' => 204,
                    'title' => "Email không hợp lệ!",
                    'message' => "Vui lòng kiểm tra lại Email của bạn."
                );
               
            }else if(checkUsername($user, $pass)){
                $return = array(
                    'status' => 204,
                    'title' => "Tên tài khoản đã tồn tại!",
                    'message' => "Hãy thử lại bằng tên tài khoản khác."
                );
               
            }else{
                if(checkEmail($email)){
                    $return = array(
                        'status' => 204,
                        'title' => "Email đã tồn tại!",
                        'message' => "Hãy thử lại bằng Email khác."
                    );
                   
                }else{
                    $id = addUser($user, $pass, $email, $phone, $fullname, $address, 0, now(), $avartar);
                    if ($id > 0) {
                        $randomStr = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomStr = str_shuffle($randomStr);
                        $code = md5(uniqid($randomStr, true));

                        $url = $actual_link = "http://$_SERVER[HTTP_HOST]/account.php?action=active&email=".urlencode($email)."&code=$code";

                        
                        $mail = new PHPMailer(true);
                        $mail->CharSet = 'UTF-8';
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'huynguyeexn@gmail.com';                     // SMTP username
                        $mail->Password   = 'amggfkfbvxokyivs';                               // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        //Recipients
                        $mail->setFrom('huynguyeexn@gmail.com', 'PRO1014-SHOP');
                        $mail->addAddress($email, $user);     // Add a recipient

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Xác minh email';
                        $mail->Body    = "<p>Xin chào $user!</p><br>";
                        $mail->Body    .= "<p>Hãy nhấn vào link phía dưới để hoàng thành quá trình xác minh tài khoản của bạn.</p><br>";
                        $mail->Body    .= "<a href='$url' style='padding: 10px 20px; background-color: #1b68ff; border: 1px solid transparent; border-radius: 5px; text-decoration'>Xác minh</a><br><br>";

                        $mail->send();
                        $return = array(
                                'status' => 200,
                                'title' => "Đăng ký thành công",
                                'message' => "Kiểm tra email đã đăng ký để kích hoạt tài khoản của bạn."
                            );
                        addVeriCode($id, $code);
                       
                    } else {
                        die("");
                        $return = array(
                                'status' => 204,
                                'title' => "Lỗi khi gửi email!",
                                'message' => "Hãy thử lại bằng Email khác, hoặc liên hệ với người quản trị để được trợ giúp."
                        );
                       
                    }
                }
            }
            print_r(json_encode($return));
            die();
            break;
        
        case "active":
            if(isset($_GET['email']) && isset($_GET['code'])){
                $email = urldecode($_GET['email']);
                $code = $_GET['code'];

                if(checkVeriCode($email)['verification_code'] == $code){
                    if(activeUser($email)){
                        $message = array(
                            'title' => "Xác minh tài khoản thành công!",
                            'message' => "Hãy đăng nhập bằng tên tài khoản và mật khẩu bạn đã đăng ký",
                            'href' => "account.php",
                            'link' => "Đăng nhập"
                        );
                        require_once('views/account/active.php');
                    }
                }else{
                    if(checkRank($email)['rank'] > 0){
                        $message = array(
                            'title' => "Tài khoản đã được xác minh!",
                            'message' => "Hãy đăng nhập bằng tên tài khoản và mật khẩu bạn đã đăng ký",
                            'href' => "account.php",
                            'link' => "Đăng nhập"
                        );
                        require_once('views/account/active.php');
                    }else{
                        $message = array(
                            'title' => "Xác minh không thành công",
                            'message' => 'Gửi lại email xác minh',
                            'href' => "account.php?action=resend-email",
                            'link' => "Gửi lại"
                        );
                        require_once('views/account/active.php');
                    }
                }
            }else{
                header('location: index.php');
            }
            die();
        break;
            default: 
            require_once('views/user/login.php');
            break;
        break;
    }