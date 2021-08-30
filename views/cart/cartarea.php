<?php
function calculator($products)
{
    $total = 0;
    foreach ($products as $product) {
        $price = getProductById($product['id'])['price'];
        $total += $price * $product['quantity'];
    }
    return $total;
}
?>


<section class="cart_area">
    <div class="container">
        <div class="cart_inner">

            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){?>
            <div class="table">

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Size</th>
                            <th scope="col" class="px-4">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $product) :  $data = getProductById($product['id']);?>
                        <tr class='allItem' id="product-<?php echo $product['id'].'-'.$product['size']; ?>">
                            <td>
                                <div class="media">
                                    <div class="product-image">
                                        <img style='width:100%' src="<?php echo $data['thumb']; ?>">
                                    </div>
                            </td>
                            <td>
                                <div class="product-details">
                                    <div class="product-title"><?php echo $data['name']; ?></div>
                                </div>
                            </td>
                            <td>
                                <div class="product-price"><?php echo numToMoney($data['price']); ?></div>
                            </td>
                            <td>
                                <div class="product-price"><?php echo $product['size']; ?></div>
                            </td>
                            <td>
                                <div class="product-quantity">
                                    <input type="number" min="1" class="form-control"
                                        value="<?php echo $product['quantity']; ?>"
                                        onchange="quantityUpdate(this, <?php echo $product['id'].',', $product['size']; ?>)">
                                </div>
                            </td>
                            <td>
                                <h5 class="total"><?php echo numToMoney($data['price'] * $product['quantity']); ?></h5>
                            </td>
                            <td>
                                <button class="deleteItem btn btn-danger" data-value="<?= $product['id']; ?>"
                                    data-size="<?= $product['size']; ?>">Xóa</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <div class="cupon_text d-flex justify-content-end">
                                    <h4><strong>Tổng đơn hàng:</strong></h4>
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="cupon_text d-flex justify-content-end">
                                    <h4 class="cart-total"><?php echo numToMoney(calculator($_SESSION['cart'])); ?></h4>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="4">
                                <form action="cart.php?action=add" method="POST" id="add-order">
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <label for="address">Địa chỉ giao hàng*: </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" name="address" value="<?= @$user['address'] ?>" placeholder = 'Địa chỉ giao hàng' required="" class="single-input">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <label for="address text-left">Tên người nhận*: </label>
                                        </div>
                                        <div class="col-8">
                                        <input type="text" name="name" value="<?= @$user['fullname'] ?>" placeholder = 'Tên người nhận' required="" class="single-input">
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <label for="address text-left">Số điện thoại*: </label>
                                        </div>
                                        <div class="col-8">
                                        <input type="text" name="phone" value="<?= @$user['phone'] ?>" placeholder = 'Số điện thoại' required="" class="single-input">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            <label for="address text-left">Email*: </label>
                                        </div>
                                        <div class="col-8">
                                        <input type="text" name="email" value="<?= @$user['email'] ?>" placeholder = 'Email' required="" class="single-input">
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td colspan="3"></td>
                            <td colspan="4">
                                <div class="checkout_btn_inner d-flex justify-content-end">
                                    <a class="gray_btn" href="shop.php">Tiếp tục mua hàng</a>
                                    <?php
                                    if(isset($_SESSION['user'])){
                                        echo '<button class="primary-btn btn" type="submit" name="add-order" onclick="addOrder()">Đặt hàng</button>';
                                    }else{
                                        echo '<a style="text-decoration: underline" href="account.php">Vui lòng đăng nhập để đặt hàng</a>';
                                    }
                                    ?>
                                    
                                </div>
                            </td>
                        </tr>
                        <?php }else{ ?>
                        <div class="text-center">
                            <h4>Bạn chưa có sản phẩm nào trong giỏ hàng </h4> <a class="gray_btn" href="shop.php">Tiếp
                                tục mua hàng</a>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>