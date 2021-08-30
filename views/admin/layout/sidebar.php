<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./home.php">
                <img src="assets/img/fav.png" alt=""  style="width: 50px;">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
                <a href="admin.php" aria-expanded="false" class="nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Bảng điều khiến</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=order" aria-expanded="false" class="nav-link">
                    <i class="fe fe-shopping-cart fe-16" aria-hidden="true"></i>
                    <span class="ml-3 item-text">Đơn hàng</span>
                </a>
                <li class="nav-item">
                <a href="admin.php?c=deal" aria-expanded="false" class="nav-link">
                    <i class="fe fe-gift fe-16" aria-hidden="true"></i>
                    <span class="ml-3 item-text">Khuyến mãi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=product" aria-expanded="false" class="nav-link">
                    <i class="fe fe-box fe-16"></i>
                    <span class="ml-3 item-text">Sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=brand" aria-expanded="false" class="nav-link">
                    <i class="fe fe-bookmark fe-16"></i>
                    <span class="ml-3 item-text">Nhãn hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=color" aria-expanded="false" class="nav-link">
                    <i class="fe fe-bookmark fe-16"></i>
                    <span class="ml-3 item-text">Màu sắc giày</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=size" aria-expanded="false" class="nav-link">
                    <i class="fe fe-bookmark fe-16"></i>
                    <span class="ml-3 item-text">Kích cỡ giày</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=tag-product" aria-expanded="false" class="nav-link">
                    <i class="fe fe-tag fe-16"></i>
                    <span class="ml-3 item-text">Thẻ sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=p-comment" aria-expanded="false" class="nav-link">
                    <i class="fe fe-message-circle fe-16"></i>
                    <span class="ml-3 item-text">Bình luận sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=p-review" aria-expanded="false" class="nav-link">
                    <i class="fe fe-star fe-16"></i>
                    <span class="ml-3 item-text">Đánh giá sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=user" aria-expanded="false" class="nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Người dùng</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=blog" aria-expanded="false" class="nav-link">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">Tin tức</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=tag-blog" aria-expanded="false" class="nav-link">
                    <i class="fe fe-tag fe-16"></i>
                    <span class="ml-3 item-text">Thẻ tin tức</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?c=b-comment" aria-expanded="false" class="nav-link">
                    <i class="fe fe-message-circle fe-16"></i>
                    <span class="ml-3 item-text">Bình luận tin tức</span>
                </a>
            </li>
            <li class="nav-item dropdown">
              <a  href="#pageLayout"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-edit fe-16"></i>
                <span class="ml-3 item-text">Chỉnh sửa giao diện</span><span class="sr-only">(current)</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="pageLayout">
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="admin.php?c=pagelayout&p=home"><span class="ml-1 item-text">Home</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="admin.php?c=pagelayout&p=shop"><span class="ml-1 item-text">Shop</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="admin.php?c=pagelayout&p=product"><span class="ml-1 item-text">Product</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="admin.php?c=pagelayout&p=blog"><span class="ml-1 item-text">Blog</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="admin.php?c=pagelayout&p=contact"><span class="ml-1 item-text">Contact</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a  href="#menuLayout"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-edit fe-16"></i>
                <span class="ml-3 item-text">Chỉnh sửa menu</span><span class="sr-only">(current)</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="menuLayout">
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="admin.php?c=menulayout&p=topmenu"><span class="ml-1 item-text">Top menu</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="admin.php?c=menulayout&p=shop"><span class="ml-1 item-text">Shop tag menu</span></a>
                </li>
              </ul>
            </li>
        </ul>
    </nav>
</aside>