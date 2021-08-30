<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Require các file cần sử dụng.
require_once('core/function.php');

// Các Model cần thiết.
require_once('models/ProductModel.php');
require_once('models/SliderModel.php');
require_once('models/ConfigModel.php');
require_once('models/BlogModel.php');
require_once('models/UserModel.php');
require_once('models/CatalogModel.php');
require_once('models/TagBlogModel.php');
require_once('models/TagOfProductModel.php');
require_once('models/TagOfBlog.php');
require_once('models/BrandModel.php');
require_once('models/ColorModel.php');
require_once('models/TagModel.php');
require_once('models/ProductDetailModel.php');
require_once('models/OrderModel.php');
require_once('models/OrderDetailModel.php');
require_once('models/CommentModel.php');
require_once('models/DealModel.php');
require_once('models/CommentOfProducts.php');
require_once('models/SizeModel.php');
require_once('models/ReviewsOfProduct.php');
require_once('models/SizeOfProduct.php');


if (!isset($_SESSION['user'])) {
    header('location: index.php');
}
// GET control = c.
$control = "home";
if (isset($_GET["c"])) {
    $control = $_GET["c"];
}

switch ($control) {
    case 'home':
        require_once('views/admin/index.php');
        break;
    case 'order':
        $order = 'home';
        if (isset($_GET['a'])) {
            $order = $_GET["a"];
        }
        switch ($order) {
            case 'home':
                $order = getAllProduct();
                require_once('views/admin/order/home.php');
                break;
            case 'updateStatus':
                $id = $_GET['id'];
                $status = $_GET['status'];
                updateStatus($id, $status);
                header("location:admin.php?c=order");
                break;
            case 'detail':
                $id = $_GET['id'];
                $order = getOrderById($id);
                $orderItems = getAllProductByOrderId($id);
                require_once('views/admin/order/order-detail.php');
                break;
        }
        break;
    case 'product':
        $product = 'home';
        if (isset($_GET['p'])) {
            $product = $_GET["p"];
        }
        switch ($product) {
            case 'home':
                $product = getAllProduct();
                require_once('views/admin/product/home.php');
                break;
            case 'insert':
                $brand = getAllBrand();
                $color = getAllColor();
                $tag = getAllTag();
                $size = getAllSize();
                require_once('views/admin/product/addnew.php');
                break;
            case 'addnew':
                $name = $_POST['name'];
                $listanh = '';
                $price = $_POST['price'];
                $view = 0;
                $tag = $_POST['tag'];
                $color = $_POST['color'];
                $size1 = $_POST['size1'];
                $size2 = $_POST['size2'];
                $cost = $_POST['cost'];
                $brand = $_POST['brand'];
                $description = '<p>' . $_POST['description'] . '</p>';
                $update =  date("Y-m-d H:i:s");
                $id = addNewProduct($name, $cost, $price, $description, $update, $brand, $view, $color);
                $thumb = $_FILES['images_sp']['name'];
                $folder = mkdir("assets/img/product/$id");
                move_uploaded_file($_FILES['images_sp']['tmp_name'], "assets/img/product/$id/" . $thumb);
                $thumb = "assets/img/product/$id/" . $thumb;
                foreach ($_FILES['hinh']['name'] as $key => $file) {
                    move_uploaded_file($_FILES['hinh']['tmp_name'][$key], "assets/img/product/$id/" . $file);
                    if ($listanh == '') {
                        $listanh = '["assets/img/product/' . $id . '/' . $file . '"';
                    } else {
                        $listanh .= ', ' . '"assets/img/product/' . $id . '/' . $file . '"';
                    }
                }
                if ($listanh == '') {
                    $listanh = '';
                } else {
                    $listanh .= ']';
                }
                // print_r($listanh);
                updateProduct($id, $name, $cost, $price, $description, $update, $thumb, $brand, $listanh, $color);
                addNewTagOfProduct($id, $tag);
                for ($i = $size1; $i <= $size2; $i++) {
                    $size = $i;
                    $quantity = $_POST['sl' . $i . ''];
                    echo  addNewProductDetail($id, $size, $quantity);
                }
                header("location:admin.php?c=product");
                break;
            case 'form_edit':
                $id = $_GET['id'];
                $brand = getAllBrand();
                $color = getAllColor();
                $tag = getAllTag();
                $product = getProductById($id);
                $product_detail = getProductDetailById($id);
                $size_id = getMinMaxSizeOfProduct($id);
                $size = getAllSize();
                $product_tag = getTagByProductId($id);
                require_once('views/admin/product/edit.php');
                break;
            case 'detail':
                $id = $_GET['id'];
                $product = getProductById($id);
                $size_id = getMinMaxSizeOfProduct($id);
                $product_tag = getNameTagByIdProduct($id);
                $product_detail = getProductDetailById($id);
                $id = $product['brand_id'];
                $brand = getBrandById($id);
                $id = $product['color_id'];
                $color = getColorId($id);
                require_once('views/admin/product/product-detail.php');
                break;
            case 'edit':
                $id = $_GET['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $view = 0;
                $listanh = '';
                $anh = '';
                $tag = $_POST['tag'];
                $color = $_POST['color'];
                $cost = $_POST['cost'];
                $brand = $_POST['brand'];
                $size1 = $_POST['size1'];
                $size2 = $_POST['size2'];
                $description = $_POST['description'];
                $update =  date("Y-m-d H:i:s");
                $thumb = $_FILES['images_sp']['name'];
                move_uploaded_file($_FILES['images_sp']['tmp_name'], "assets/img/product/$id/" . $thumb);
                if (strlen($thumb) > 0) {
                    move_uploaded_file($_FILES['images_sp']['tmp_name'], "assets/img/product/$id/" . $thumb);
                    $thumb = 'assets/img/product/' . $id . '/' . $thumb;
                } else {
                    $row = getProductById($id);
                    $thumb  = $row['thumb'];
                }
                foreach ($_FILES['hinh']['name'] as $key => $file) {
                    $anh .= $_FILES['hinh']['name'][$key];
                }
                if (strlen($anh) > 0) {
                    foreach ($_FILES['hinh']['name'] as $key => $file) {
                        move_uploaded_file($_FILES['hinh']['tmp_name'][$key], "assets/img/product/$id/" . $file);
                        if ($listanh == '') {
                            $listanh = '["assets/img/product/' . $id . '/' . $file . '"';
                        } else {
                            $listanh .= ', ' . '"assets/img/product/' . $id . '/' . $file . '"';
                        }
                    }
                    if ($listanh == '') {
                        $listanh = '';
                    } else {
                        $listanh .= ']';
                    }
                } else {
                    $row = getProductById($id);
                    $listanh  = $row['images'];
                }
                updateProduct($id, $name, $cost, $price, $description, $update, $thumb, $brand, $listanh, $color);
                updateTagOfProduct($id, $tag);
                deleteProductDetailById($id);
                for ($i = $size1; $i <= $size2; $i++) {
                    $size = $i;
                    $quantity = $_POST['sl' . $i . ''];
                    addNewProductDetail($id, $size, $quantity);
                }
                header("location:admin.php?c=product");
                break;
            case 'remove':
                $id = $_GET['id'];
                deleteProduct($id);
                header("location:admin.php?c=product");
                break;
            case 'xoa':
                $id = $_GET['xn'];
                $product = getProductById($id);
                echo $product['thumb'] . ',' . $product['name'];
                break;
            case 'search':
                $content = $_GET['content'];
                $sp = '';
                $product = getAllProduct();
                if ($content == '') {
                    $id = 0;
                    foreach ($product as $p) {
                        $id++;
                        $description = substr(trim($p['description'], '"'), 0, 100);
                        $sp .= '
                        <tr>
                            <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox" id="' . $id . '">
                                <label class="custom-control-label" for="' . $id . '"></label>
                            </div>
                            </td><td class="text-muted">' . $p['id'] . '</td>
                            <td>
                            <div class="avatar avatar-md">
                                <img src="' . $p['thumb'] . '" alt="..." class="avatar-img rounded-circle">
                            </div>
                            </td>
                            <td>
                            <p class="mb-0 text-muted"><strong>' . $p['name'] . '</strong></p>
                            </td>
                            <td class="text-muted">' . $p['update'] . '</td>
                            <td class="text-muted">' . numToMoney($p['cost']) . '</td>
                            <td class="text-muted">' . numToMoney($p['price']) . '</td>
                            <td style = "width:33%;" class="text-muted">' . $description . '</td>
                            <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="admin.php?c=product&p=form_edit&id=' . $p['id'] . '">Sửa</a>
                                <a class="dropdown-item" href="admin.php?c=product&p=remove&id=' . $p['id'] . '">Xóa</a>
                            </div>
                            </td>
                        </tr>
                        ';
                    }
                } else {
                    $id = 0;
                    foreach ($product as $p) {
                        if (strlen(strpos(strtolower($p['name']), strtolower("$content"))) > 0) {
                            $id++;
                            $description = substr(trim($p['description'], '"'), 0, 100);
                            $sp .= '
                            <tr>
                                <td>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input checkbox" id="' . $id . '">
                                    <label class="custom-control-label" for="' . $id . '"></label>
                                  </div>
                                </td><td class="text-muted">' . $p['id'] . '</td>
                                <td>
                                  <div class="avatar avatar-md">
                                    <img src="' . $p['thumb'] . '" alt="..." class="avatar-img rounded-circle">
                                  </div>
                                </td>
                                <td>
                                  <p class="mb-0 text-muted"><strong>' . $p['name'] . '</strong></p>
                                </td>
                                <td class="text-muted">' . $p['update'] . '</td>
                                <td class="text-muted">' . numToMoney($p['cost']) . '</td>
                                <td class="text-muted">' . numToMoney($p['price']) . '</td>
                                <td style = "width:33%;" class="text-muted">' . $description . '</td>
                                <td>
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=product&p=form_edit&id=' . $p['id'] . '">Sửa</a>
                                    <a class="dropdown-item" href="admin.php?c=product&p=remove&id=' . $p['id'] . '">Xóa</a>
                                  </div>
                                </td>
                              </tr>
                            ';
                        }
                    }
                }
                if ($sp == '') {
                    echo 'Sản phẩm này không tồn tại!';
                } else {
                    echo $sp;
                }
                break;

            case 'chosedelete':
                $jsonText = $_GET['delete'];
                $mang = explode(',', $jsonText);
                $sp = '';
                for ($i = 1; $i < count($mang); $i++) {
                    $id = $mang[$i];
                    deleteProduct($id);
                }
                $product = getAllProduct();
                $id = 0;
                foreach ($product as $p) {
                    $id++;
                    $description = substr(trim($p['description'], '"'), 0, 100);
                    $sp .= '
                    <tr>
                        <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input checkbox" id="' . $id . '">
                            <label class="custom-control-label" for="' . $id . '"></label>
                        </div>
                        </td><td class="text-muted">' . $p['id'] . '</td>
                        <td>
                        <div class="avatar avatar-md">
                            <img src="' . $p['thumb'] . '" alt="..." class="avatar-img rounded-circle">
                        </div>
                        </td>
                        <td>
                        <p class="mb-0 text-muted"><strong>' . $p['name'] . '</strong></p>
                        </td>
                        <td class="text-muted">' . $p['update'] . '</td>
                        <td class="text-muted">' . numToMoney($p['cost']) . '</td>
                        <td class="text-muted">' . numToMoney($p['price']) . '</td>
                        <td style = "width:33%;" class="text-muted">' . $description . '</td>
                        <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="admin.php?c=product&p=form_edit&id=' . $p['id'] . '">Sủa</a>
                            <a class="dropdown-item" href="admin.php?c=product&p=remove&id=' . $p['id'] . '">Xóa</a>
                        </div>
                        </td>
                    </tr>
                    ';
                }
                echo $sp;
                break;

            case 'next':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $min = $_GET['min'];
                    $max = $_GET['max'];
                    $product_detail = getProductDetailById($id);
                    $so = 0;
                    $sp = '
                        <table style="width:80%;margin:0 auto;margin-bottom:20px;">
                    ';
                    for ($i = $min; $i <= $max; $i++) {
                        $so++;
                        $sl = 0;
                        foreach ($product_detail as $p) {
                            if ($i == $p['size_id']) {
                                $sl = $p['quantity'];
                            }
                        }
                        $sp .= '
                        <div style="width:90%;margin:0 auto;" class="form-group row float-left">
                            <label class="float-left">Kích Thước</label>
                            <div class="col-sm-5 mb-3">
                                <input type="button" value="' . $i . '" class="form-control" name="size' . $i . '" >
                            </div>
                            <label class="float-left">Số Lượng</label>
                            <div class="col-sm-5 mb-3">
                                <input type="text" style="margin-bottom:5px;" value="' . $sl . '" name="sl' . $i . '" class="soluong form-control" name="price">
                                <span class="loisl1" style="color:red;">Vui lòng nhập số lượng</span>
                                <span class="loisl2" style="color:red;">Vui lòng nhập số lượng khác không</span>
                            </div>
                        </div>
                        ';
                    }
                    $sp .= '
                            </table>
                            <div class="form-group row  float-right">
                            <div class="col-sm-4 mb-3 float-right">
                                <input type="submit" style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;color:white;margin-right:20px;" value="Thêm">
                            </div>
                        </div>
                    </section>
                    ';
                } else {
                    $min = $_GET['min'];
                    $max = $_GET['max'];
                    $so = 0;
                    $sp = '
                        <table style="width:80%;margin:0 auto;margin-bottom:20px;">
                    ';
                    for ($i = $min; $i <= $max; $i++) {
                        $so++;
                        $sp .= '
                        <div style="width:90%;margin:0 auto;" class="form-group row float-left">
                            <label class="float-left">Kích Thước</label>
                            <div class="col-sm-5 mb-3">
                                <input type="button" value="' . $i . '" class="form-control" name="size' . $i . '" >
                            </div>
                            <label class="float-left">Số Lượng</label>
                            <div class="col-sm-5 mb-3">
                                <input type="text" style="margin-bottom:5px;" name="sl' . $i . '" class="soluong form-control" name="price">
                                <span class="loisl1" style="color:red;">Vui lòng nhập số lượng</span>
                                <span class="loisl2" style="color:red;">Vui lòng nhập số lượng khác không</span>
                            </div>
                        </div>
                        ';
                    }
                    $sp .= '
                            </table>
                            <div class="form-group row  float-right">
                            <div class="col-sm-4 mb-3 float-right">
                                <input type="submit" style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;color:white;margin-right:20px;" value="Thêm">
                            </div>
                        </div>
                    </section>
                    ';
                }
                echo $sp;
                break;
            default:
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    case 'brand':
        $action = "home";
        if (isset($_GET["a"])) {
            $action = $_GET["a"];
        }

        switch ($action) {
            case 'home':
                require_once('views/admin/brand/brand.php');
                break;
            case 'create':
                $tags = getAllBrand();
                require_once('views/admin/brand/add-brand.php');
                break;
            case 'add':
                $name = $_POST['name'];
                $show = $_POST['show'];
                if(addNewBrand($name,$show)){
                    header('Location: admin.php?c=brand');
                }else{
                    echo 'Lỗi khi thêm nhãn hàng';
                }
            break;
            case 'edit':
                $id = $_GET['id'];
                $brand = getBrandById($id);
                require_once('views/admin/brand/edit-brand.php');
                break;

            case 'update':
                $id = $_GET['id'];
                $name = $_POST['name'];
                $show = $_POST['show'];
                updateBrand($name,$show,$id);
                header('location: admin.php?c=brand');
                echo 'Lỗi khi sửa nhãn hàng';

            break;
            case 'xoa':
                $id = $_GET['xn'];
                $brand = getBrandById($id);
                echo $brand['name'];
            break;
            default:
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                include("404.php");
                return;
            break;
            case 'delete':
                $id = $_GET['id'];
                deleteBrand($id);
                header('Location: admin.php?c=brand');
            break;
        }
        break;
    case 'size':
        $size = 'home';
        if (isset($_GET['p'])) {
            $size = $_GET["p"];
        }
        switch ($size) {
            case 'home':
                $size = getAllSize();
                require_once('views/admin/size/home.php');
                break;
            case 'insert':
                require_once('views/admin/size/addnew.php');
                break;
            case 'addnew':
                $size = $_POST['size'];
                $id = isset($_POST['codemau']) ? $_POST['codemau'] : "";
                addNewSize($size);
                header("location:admin.php?c=size");
                break;
            case 'form_edit':
                $id = $_GET['id'];
                $size = getSizeId($id);
                require_once('views/admin/size/edit.php');
                break;
            case 'edit':
                $id = $_GET['id'];
                $size = $_POST['size'];
                updateSize($size,$id);
                header("location:admin.php?c=size");
                break;
            case 'remove':
                $id = $_GET['id'];
                deleteSize($id);
                header("location:admin.php?c=size");
            break;
            case 'xoa':
                $id = $_GET['xn'];
                $size = getSizeId($id);
                echo $size['size'];
            break;
            case 'ktsize':
                $size = $_GET['size'];
                $allsize = getAllSize();
                $kt = 0;
                foreach ($allsize as $s) {
                    if ($s['size'] == $size) {
                        $kt = 1;
                    }
                    $kthuoc = $s['size'];
                }
                echo $kt . ',' . $kthuoc;
                break;
            case 'search':
                $content = $_GET['content'];
                $sp = '';
                $allsize = getAllSize();
                if ($content == '') {
                    $i = 0;
                    foreach ($allsize as $t) {
                        $i++;
                        $sp .= '
                        <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                              <label class="custom-control-label" for="' . $i . '"></label>
                            </div>
                          </td><td class="text-muted">' . $t['id'] . '</td>
                          </td><td class="text-muted">' . $t['size'] . '</td>
                          <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="admin.php?c=size&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                              <a class="dropdown-item" href="admin.php?c=size&p=remove&id=' . $t['id'] . '">Xóa</a>
                            </div>
                          </td>
                        </tr>
                        ';
                    }
                } else {
                    $i = 0;
                    foreach ($allsize as $t) {
                        if (strlen(strpos(strtolower($t['size']), strtolower("$content"))) > 0) {
                            $i++;
                            $sp .= '
                            <tr>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                                    <label class="custom-control-label" for="' . $i . '"></label>
                                  </div>
                                </td><td class="text-muted">' . $t['id'] . '</td>
                                </td><td class="text-muted">' . $t['size'] . '</td>
                                <td>
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=size&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                                    <a class="dropdown-item" href="admin.php?c=size&p=remove&id=' . $t['id'] . '">Xóa</a>
                                  </div>
                                </td>
                              </tr>
                            ';
                        }
                    }
                }
                if ($sp == '') {
                    echo 'Sản phẩm này không tồn tại!';
                } else {
                    echo $sp;
                }
                break;

            case 'chosedelete':
                $jsonText = $_GET['delete'];
                $mang = explode(',', $jsonText);
                $sp = '';
                for ($i = 1; $i < count($mang); $i++) {
                    $id = $mang[$i];
                    deleteSize($id);
                }
                $allsize = getAllSize();
                $i = 0;
                foreach ($allsize as $t) {
                    $i++;
                    $sp .= '
                    <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                          <label class="custom-control-label" for="' . $i . '"></label>
                        </div>
                      </td><td class="text-muted">' . $t['id'] . '</td>
                      </td><td class="text-muted">' . $t['size'] . '</td>
                      <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="admin.php?c=size&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                          <a class="dropdown-item" href="admin.php?c=size&p=remove&id=' . $t['id'] . '">Xóa</a>
                        </div>
                      </td>
                    </tr>
                    ';
                }
                echo $sp;
                break;
            default:
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    case 'color':
        $color = 'home';
        if (isset($_GET['p'])) {
            $color = $_GET["p"];
        }
        switch ($color) {
            case 'home':
                $color = getAllColor();
                require_once('views/admin/color/home.php');
                break;
            case 'insert':
                require_once('views/admin/color/addnew.php');
                break;
            case 'addnew':
                $name = $_POST['name'];
                $colorCode = isset($_POST['codemau']) ? $_POST['codemau'] : "";
                addNewColor($colorCode, $name);
                header("location:admin.php?c=color");
                break;
            case 'form_edit':
                $id = $_GET['id'];
                $color = getColorId($id);
                require_once('views/admin/color/edit.php');
                break;
            case 'edit':
                $id = $_GET['id'];
                $name = $_POST['name'];
                $colorCode = isset($_POST['codemau']) ? $_POST['codemau'] : "";
                updateColor($id, $colorCode, $name);
                header("location:admin.php?c=color");
                break;
            case 'remove':
                $id = $_GET['id'];
                deleteColor($id);
                header("location:admin.php?c=color");
            break;
            case 'xoa':
                $id = $_GET['xn'];
                $color = getColorId($id);
                echo $color['name'];
            break;
            case 'search':
                $content = $_GET['content'];
                $sp = '';
                $color = getAllColor();
                if ($content == '') {
                    $i = 0;
                    foreach ($color as $t) {
                        $i++;
                        $sp .= '
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                                <label class="custom-control-label" for="' . $i . '"></label>
                                </div>
                            </td><td class="text-muted">' . $t['id'] . '</td>
                            </td><td class="text-muted">' . $t['name'] . '</td>
                            </td><td class="text-muted">' . $t['colorCode'] . '</td>
                            <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="admin.php?c=color&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                                <a class="dropdown-item" href="admin.php?c=color&p=remove&id=' . $t['id'] . '">Xóa</a>
                                </div>
                            </td>
                        </tr>
                        ';
                    }
                } else {
                    $i = 0;
                    foreach ($color as $t) {
                        if (strlen(strpos(strtolower($t['name']), strtolower("$content"))) > 0) {
                            $i++;
                            $sp .= '
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                                    <label class="custom-control-label" for="' . $i . '"></label>
                                    </div>
                                </td><td class="text-muted">' . $t['id'] . '</td>
                                </td><td class="text-muted">' . $t['name'] . '</td>
                                </td><td class="text-muted">' . $t['colorCode'] . '</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=color&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                                    <a class="dropdown-item" href="admin.php?c=color&p=remove&id=' . $t['id'] . '">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                            ';
                        }
                    }
                }
                if ($sp == '') {
                    echo 'Sản phẩm này không tồn tại!';
                } else {
                    echo $sp;
                }
                break;

            case 'chosedelete':
                $jsonText = $_GET['delete'];
                $mang = explode(',', $jsonText);
                $sp = '';
                for ($i = 1; $i < count($mang); $i++) {
                    $id = $mang[$i];
                    deleteColor($id);
                }
                $color = getAllColor();
                $i = 0;
                foreach ($color as $t) {
                    $i++;
                    $sp .= '
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                            <label class="custom-control-label" for="' . $i . '"></label>
                            </div>
                        </td><td class="text-muted">' . $t['id'] . '</td>
                        </td><td class="text-muted">' . $t['name'] . '</td>
                        </td><td class="text-muted">' . $t['colorCode'] . '</td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="admin.php?c=color&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                            <a class="dropdown-item" href="admin.php?c=color&p=remove&id=' . $t['id'] . '">Xóa</a>
                            </div>
                        </td>
                    </tr>
                    ';
                }
                echo $sp;
                break;
            default:
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    case 'deal':
        $action = "show";
        if (isset($_GET["a"])) {
            $action = $_GET["a"];
        }
        switch ($action) {
            case 'show':
                require_once('views/admin/deal/deal.php');
                break;
            case 'detail':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    require_once('views/admin/deal/deal-detail.php');
                } else {
                    header("location: admin.php?c=deal");
                }

                break;
        }

        break;
        break;
    case 'tag-product':
        $tag = 'home';
        if (isset($_GET['p'])) {
            $tag = $_GET["p"];
        }
        switch ($tag) {
            case 'home':
                $tag = getAllTag();
                require_once('views/admin/tag/home.php');
                break;
            case 'insert':
                require_once('views/admin/tag/addnew.php');
                break;
            case 'addnew':
                $name = $_POST['name'];
                $anhien = $_POST['anhien'];
                addNewTagProduct($anhien, $name);
                header("location:admin.php?c=tag-product");
                break;
            case 'form_edit':
                $id = $_GET['id'];
                $tag = getTagId($id);
                require_once('views/admin/tag/edit.php');
                break;
            case 'edit':
                $id = $_GET['id'];
                $name = $_POST['name'];
                $anhien = $_POST['anhien'];
                updateTagProduct($id, $anhien, $name);
                header("location:admin.php?c=tag-product");
                break;
            case 'remove':
                $id = $_GET['id'];
                deleteTagProduct($id);
                header("location:admin.php?c=tag-product");
                break;
            case 'xoa':
                $id = $_GET['xn'];
                $tag_product = getTagId($id);
                echo $tag_product['name'];
                break;
            case 'search':
                $content = $_GET['content'];
                $sp = '';
                $tag = getAllTag();
                if ($content == '') {
                    $i = 0;
                    foreach ($tag as $t) {
                        $i++;
                        $sp .= '
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                                <label class="custom-control-label" for="' . $i . '"></label>
                                </div>
                            </td><td class="text-muted">' . $t['id'] . '</td>
                            </td><td class="text-muted">' . $t['name'] . '</td>
                            <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="admin.php?c=tag-product&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                                <a class="dropdown-item" href="admin.php?c=tag-product&p=remove&id=' . $t['id'] . '">Xóa</a>
                                </div>
                            </td>
                        </tr>
                        ';
                    }
                } else {
                    $i = 0;
                    foreach ($tag as $t) {
                        if (strlen(strpos(strtolower($t['name']), strtolower("$content"))) > 0) {
                            $i++;
                            $sp .= '
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                                    <label class="custom-control-label" for="' . $i . '"></label>
                                    </div>
                                </td><td class="text-muted">' . $t['id'] . '</td>
                                </td><td class="text-muted">' . $t['name'] . '</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=tag-product&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                                    <a class="dropdown-item" href="admin.php?c=tag-product&p=remove&id=' . $t['id'] . '">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                            ';
                        }
                    }
                }
                if ($sp == '') {
                    echo 'Tag này không tồn tại!';
                } else {
                    echo $sp;
                }
                break;
            case 'chosedelete':
                $jsonText = $_GET['delete'];
                $mang = explode(',', $jsonText);
                $sp = '';
                for ($i = 1; $i < count($mang); $i++) {
                    $id = $mang[$i];
                    deleteTagProduct($id);
                }
                $tag = getAllTag();
                $id = 0;
                foreach ($tag as $t) {
                    $id++;
                    $sp .= '
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="' . $t['id'] . '" name="check_box" id="' . $i . '">
                            <label class="custom-control-label" for="' . $i . '"></label>
                            </div>
                        </td><td class="text-muted">' . $t['id'] . '</td>
                        </td><td class="text-muted">' . $t['name'] . '</td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="admin.php?c=tag-product&p=form_edit&id=' . $t['id'] . '">Sửa</a>
                            <a class="dropdown-item" href="admin.php?c=tag-product&p=remove&id=' . $t['id'] . '">Xóa</a>
                            </div>
                        </td>
                    </tr>
                    ';
                }
                echo $sp;
                break;
            default:
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    case 'p-review':
        $action = "show";
        if (isset($_GET["p"])) {
            $action = $_GET["p"];
        }
        switch ($action) {
            case 'show':
                require_once('views/admin/product-review/product-review.php');
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deleteReviewProduct($id);
                }
                header('location:admin.php?c=p-review');
                break;
            case 'edit':
                $id = $_GET['id'];
                $com = getAllReviewProduct();
                $getrv = getReviewById($id);
                include 'views/admin/product-review/edit-review.php';
                break;
            case 'update';
                $id = $_GET['id'];
                $com = $_POST['comment'];
                updateReviewProduct($id, $com);
                header('location: admin.php?c=p-review');
                break;    
        }
        break;
    case 'p-comment':
        $action = "show";
        if (isset($_GET["p"])) {
            $action = $_GET["p"];
        }
        switch ($action) {
            case 'show':
                require_once('views/admin/product-comment/product-comment.php');
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    DeleteCommentProductById($id);
                }
                header('location: admin.php?c=p-comment');
                break;
            case 'xoa':
                $id = $_GET['xn'];
                $comment = getCommentById($id);
                echo $comment['content'];
                break;
            case 'edit':
                $id = $_GET['id'];
                $com = getAllCommentProduct();
                $getcom = getCommentById($id);
                include 'views/admin/product-comment/edit-comment.php';
                break;
            case 'update';
                $id = $_GET['id'];
                $com = $_POST['comment'];
                updateCommentProduct($id, $com);
                header('location: admin.php?c=p-comment');
                break;
            
        }
        break;
    case 'b-comment':
        $action = "show";
        if (isset($_GET["b"])) {
            $action = $_GET["b"];
        }
        switch ($action) {
            case 'show':
                require_once('views/admin/blog-comment/blog-comment.php');
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deleteBlogComment($id);
                }
                header('location: admin.php?c=b-comment');
                break;

            case 'edit':
                $id = $_GET['id'];
                $com = getAllBlogComment();
                $getcom = getBlogCommentById($id);
                include 'views/admin/blog-comment/edit-comment.php';
                break;

            case 'update';
                $id = $_GET['id'];
                $com = $_POST['comment'];
                updateCommentBlog($id, $com);
                header('location: admin.php?c=b-comment');
                break;
        }
        break;
    case 'user':
        $action = "home";
        if (isset($_GET["p"])) {
            $action = $_GET["p"];
        }
        switch ($action) {
            case 'home':
                require_once('views/admin/user/user.php');
                break;
            case 'form_edit':
                $id = $_GET['id'];
                $user = getUserById($id);
                require_once('views/admin/user/edit.php');
                break;
            case 'update':
                $id = $_GET['id'];
                $fullname = $_POST['tentk'];
                $username = $_POST['ten'];
                $phone = $_POST['phone'];
                $rank = $_POST['rank'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $birthday = $_POST['date'];
                $avartar = $_FILES['images_sp']['name'];
                if (strlen($avartar) > 0) {
                   move_uploaded_file($_FILES['images_sp']['tmp_name'],"assets/img/user/".$avartar);
                   $avartar = 'assets/img/user/'.$avartar.'';
                }else {
                    $row = getUserById($id);
                    $avartar  = $row['avartar'];
                }
                updateUser($username,$email,$phone,$address,$birthday,$id,$rank,$fullname,$avartar);
                header('location: admin.php?c=user');
            break;
            case 'xoa':
                $id = $_GET['xn'];
                $user = getUserById($id);
                echo $user['username'];
            break;
            default:
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                include("404.php");
                return;
            break;
            case 'delete':
                $id = $_GET['id'];
                DeleteUser($id);
                header('Location: admin.php?c=user');
            break;
        }
        break;
    case 'tag-blog':
        $tagblog = "t-blog";
        if (isset($_GET["t"])) {
            $tagblog = $_GET["t"];
        }
        switch ($tagblog) {
            case 't-blog':
                require_once('views/admin/tag-blog/tag-blog.php');
                break;
            case 'create':
                $tags = getAllTagBlog();
                require_once('views/admin/tag-blog/add-tagblog.php');
                break;

            case 'add':
                $tagname = $_POST['name'];
                $show = 1;
                $priority = $_POST['priority'];
                addNewTagBlog($tagname, $priority);
                header('location: admin.php?c=tag-blog');
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deleteTagBlog($id);
                }
                header('location: admin.php?c=tag-blog');
                break;

            case 'edit':
                $id = $_GET['id'];
                $tags = getAllTagBlog();
                $gettag = getTagBlogById($id);
                include 'views/admin/tag-blog/edit-tagblog.php';
                break;

            case 'update';
                $id = $_GET['id'];
                $tagname = $_POST['name'];
                $show = 1;
                $priority = $_POST['priority'];
                updateTagBlog($id, $tagname, $priority);
                header('location: admin.php?c=tag-blog');
                break;
        }
        break;
    case 'blog':
        $action = "show";
        if (isset($_GET["a"])) {
            $action = $_GET["a"];
        }
        switch ($action) {
            case 'show':
                require_once('views/admin/blog/blog.php');
                break;
            case 'create':
                $tags = getAllTagBlog();
                require_once('views/admin/blog/add-blog.php');
                break;

            case 'add':
                $userId = $_SESSION['user']['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $tags = $_POST['tag'];
                $content = $_POST['content'];
                $thumb = NULL;
                $now = now();
                $blogId = intval(getMaxBlogId()) + 1;

                // Upload.
                $target_dir = "assets/img/blog/$blogId/";

                //Check if the directory already exists.
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755);
                }

                $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
                $imageFiletag = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (isset($_FILES["thumb"]["name"])) {
                    $check = getimagesize($_FILES["thumb"]["tmp_name"]);
                    if ($check !== false) {
                        if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
                            $thumb = $target_file;
                        } else {
                            echo "Xin lỗi, đã có lỗi xảy ra khi tải lên hình ảnh. Vui lòng thử lại!";
                            die();
                        }
                    } else {
                        echo "File không phải là hình ảnh.";
                        die();
                    }
                }
                addNewBlog($userId, $title, $thumb, $now, $description, $content);
                foreach ($tags as $tag) {
                    insertTagOfBlog($blogId, $tag);
                }
                header('location: admin.php?c=blog');
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deleteBlog($id);
                }
                header('location: admin.php?c=blog');
                break;

            case 'edit':
                $id = $_GET['id'];
                $tags = getAllTagBlog();
                $tagOfBlog = getTagByBlogId($id);

                $getblog = getBlogById($id);
                include 'views/admin/blog/edit-blog.php';

                break;

            case 'update':
                // $id = $_POST['id'];
                $userId = $_SESSION['user']['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $content = $_POST['content'];
                $thumb = NULL;
                $now = now();
                // $blogId = intval(getMaxBlogId()) + 1;
                $blogid = $_GET['id'];

                // Upload.
                $target_dir = "assets/img/blog/$blogid/";

                //Check if the directory already exists.
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755);
                }

                $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (isset($_FILES["thumb"]["name"])) {
                    $check = getimagesize($_FILES["thumb"]["tmp_name"]);
                    if ($check !== false) {
                        if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
                            $thumb = $target_file;
                        } else {
                            echo "Xin lỗi, đã có lỗi xảy ra khi tải lên hình ảnh. Vui lòng thử lại!";
                            die();
                        }
                    } else {
                        echo "File không phải là hình ảnh.";
                        die();
                    }
                }
                updateBlog($blogid, $title, $description, $thumb, $content);
                if (isset($_POST['tag'])) {
                    $tags = $_POST['tag'];
                    foreach ($tags as $tag) {
                        updateTagOfBlog($blogid, $tag);
                    }
                } else {
                    $blog = getTagByBlogId($blogid);
                    foreach ($blog as $blogs) {
                        $t = $blogs['tag_id'];
                        updateTagOfBlog($blogid, $t);
                    }
                }

                header('location: admin.php?c=blog');

                break;
            default:
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    case 'pagelayout':

        $page = "";
        if (isset($_GET["p"])) {
            $page = $_GET["p"];
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
            include("404.php");
            return;
        }

        switch ($page) {
            case 'home':
                if (isset($_POST['save'])) {
                    $json = urldecode($_POST['save']);
                    if (updateConfig('layout', $json)) {
                        return true;
                    } else {
                        return false;
                    }
                }
                $layouts = json_decode(getConfigByName("layout")['config'])->home;
                $layoutDefault = json_decode(getConfigByName("default_layout")['config'])->home;

                require_once('views/admin/edit-layout/home.php');
                break;
            case 'shop':
                $layouts = json_decode(getConfigByName("layout")['config'])->shop;
                $layoutDefault = json_decode(getConfigByName("default_layout")['config'])->shop;

                require_once('views/admin/edit-layout/shop.php');
                break;
            case 'product':
                break;
            case 'blog':
                break;
            case 'contact':
                break;
            default:
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    case 'menulayout':
        $menu = "";
        if (isset($_GET["p"])) {
            $menu = $_GET["p"];
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
            include("404.php");
            return;
        }

        switch ($menu) {
            case 'topmenu':
                if (isset($_POST['save'])) {
                    $json = urldecode($_POST['save']);
                    if (updateConfig('layout', $json)) {
                        return true;
                    } else {
                        return false;
                    }
                }
                $layouts = json_decode(getConfigByName("layout")['config'])->topmenu;
                $layoutDefault = json_decode(getConfigByName("default_layout")['config'])->topmenu;

                require_once('views/admin/edit-layout/topmenu.php');
                break;
            case 'shop':
                $layouts = json_decode(getConfigByName("layout")['config'])->shop;
                $layoutDefault = json_decode(getConfigByName("default_layout")['config'])->shop;

                require_once('views/admin/edit-layout/shop.php');
                break;
            case 'product':
                break;
            case 'blog':
                break;
            case 'contact':
                break;
            default:
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;

    default:
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
        include("404.php");
        return;
        break;
}
