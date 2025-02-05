<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner text-center">
                    <h1 class="ltn__page-title">Tài Khoản Của Tôi</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li>Tài Khoản Của Tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="liton__wishlist-area pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- PRODUCT TAB AREA START -->
                <div class="ltn__product-tab-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ltn__tab-menu-list mb-50">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_tab_1_1">Bảng Điều Khiển<i class="fas fa-home"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_tab_1_2">Đơn Hàng <i class="fa-solid fa-bag-shopping"></i></a>
                                        <!-- <a data-bs-toggle="tab" href="#liton_tab_1_3">Đổi Mật Khẩu<i class="fa-solid fa-unlock"></i></a> -->
                                        <!-- <a data-bs-toggle="tab" href="#liton_tab_1_4">Thay Đổi Địa Chỉ <i class="fa-solid fa-map-location-dot"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_tab_1_5">Thay Đổi Thông Tin <i class="fa-solid fa-circle-info"></i></a> -->
                                        <!-- <a data-bs-toggle="tab" href="#liton_tab_1_6">Danh Sách Yêu Thích <i class="fa-solid fa-heart"></i></i></a> -->
                                        <a href="login.html">Đăng Xuất <i class="fa-solid fa-door-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade  active show" id="liton_tab_1_1">
                                    <div class="ltn__myaccount-tab-content-inner">
                                            <p>Xin Chào <strong>duongkz365</strong> (Không phải bạn ? <small><a class="fw-bold" href="login-register.html">ĐĂNG XUẤT</a></small> )</p>                            
                                        </div>
                                        <div class="ltn__myaccount-tab-content-inner mb-50">
                                            <h4>Thông tin tài khoản</h4>
                                            <div class="ltn__form-box">
                                                <form method="post" action="<?=_WEB_ROOT . "/User/SaveCustomer"?>">
                                                    <input type="hidden" name="id" value="<?=$customer[0]['Id']?>" >
                                                    <div class="row mb-50">
                                                        <div class="col-md-6">
                                                            <label>Username</label>
                                                            <input type="text" name="UserName" placeholder="Tên đăng nhập" value="<?=$customer[0]['UserName']?>" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Old Password</label>
                                                            <input type="password" name="OldPassword" placeholder="Enter Old Password">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>New Password</label>
                                                            <input type="password" name="NewPassword" placeholder="Enter New Password">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Confirm Password</label>
                                                            <input type="password" name="ConfirmPassword" placeholder="Enter Confirm Password">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>FirstName</label>
                                                            <input type="text" name="FirstName" placeholder="FirstName" value="<?=$customer[0]['FirstName']?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>LastName</label>
                                                            <input type="text" name="LastName" placeholder="LastName" value="<?=$customer[0]['LastName']?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Phone number</label>
                                                            <input type="text" name="Phone" placeholder="Your phone number" value="<?=$customer[0]['Phone']?>">
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <label>Ngày Đăng Ký:</label>
                                                            <input type="text" name="ltn__lastname" placeholder="01-01-9999">
                                                        </div> -->
                                                        <div class="col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" name="Email" placeholder="example@gmail.com" value="<?=$customer[0]['Email']?>">
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <label>Ngày Sinh:</label>
                                                            <input type="email" name="ltn__lastname" placeholder="07-07-2002">
                                                        </div> -->
                                                        <div class="btn-wrapper">
                                                            <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Lưu Thay Đổi</button>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                                <h4>Addresses:</h4>
                                                                <button type="button" id="myaccount-add-address-btn" class="btn btn-success ms-5 " style="padding: 8px;">+ Add more address</button>
                                                            </div>
                                                            <?php
                                                                foreach($addresses as $key => $address)
                                                                {
                                                                    echo '
                                                                        <div class="d-flex justify-content-between align-items-start">
                                                                            <input class="" type="text" name="Address" placeholder="Enter Your Address" value="'.$address['detail'].', '.$address['ward'].', '.$address['district'].', '.$address['province'].'" readonly>
                                                                            <button type="button" class="ms-4 btn btn-danger btn-delete-address" data-address-id="'.$address['id'].'">X</button>
                                                                        </div>                                                                    
                                                                    ';
                                                                 }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_2">
                                        <div class="ltn__myaccount-tab-content-inner">
                                                <h4>Đơn Mua</h4>
                                                <div class="container">
                                                    <div class="row">
                                                        <?php
                                                            foreach($orders as $order)
                                                            {
                                                                    if ($order['customer_id'] == $customer[0]['Id'])
                                                                    {
                                                                        $paid = $order['paid'] == 0 ? "Chưa thanh toán" : "Đã thanh toán";
                                                                        $delivery_date = $order['delivery_date'] == "0000-00-00" ? "Chưa giao" : $order['delivery_date'];
                                                                        echo '
                                                                            <div class="col-12 p-4 mb-4" style="background-color: #c6e2ff;">
                                                                                <div class="col-12 p-3 d-flex justify-content-around align-items-center flex-wrap">
                                                                                    <h4 class="p-3" style="font-size: 18px;">Hóa đơn: '. $order['id'] .'</h4>
                                                                                    <h4 class="p-3" style="font-size: 18px;">Tình trạng: '. $order['status'] .'</h4>
                                                                                    <h4 class="p-3" style="font-size: 18px;">Thanh toán: '. $paid .'</h4>
                                                                                    <h4 class="p-3" style="font-size: 18px;">Ngày đặt: '. $order['order_date'] .'</h4>
                                                                                    <h4 class="p-3" style="font-size: 18px;">Ngày đi giao: '. $delivery_date .'</h4>
                                                                                </div>
                                                                                <div class="order-pay-user-info-wrapper col-12">
                                                                                    <h3>Thông tin khách hàng</h3>
                                                                                    <div class="order-pay-user-info-content row">
                                                                                        <input type="hidden" name="customer_id" value="'. $customer[0]['Id'] .'">
                                                                                        <div class="col-3 d-flex flex-column">
                                                                                            <label for="order-pay-user-info-name">Tên</label>
                                                                                            <input class="form-input" value="' . $customer[0]['FirstName'] . " " . $customer[0]['LastName'] . '" disabled>
                                                                                        </div>
                                                                                        <div class="col-3 d-flex flex-column">
                                                                                            <label for="order-pay-user-info-phone">Số điện thoại</label>
                                                                                            <input class="form-input" name="phone" value="'. $order['phone'] .'" disabled>
                                                                                        </div>
                                                                                        <div class="col-6 d-flex flex-column">
                                                                                            <label for="order-pay-user-info-address">Địa chỉ</label>
                                                                                            <input class="form-input" name="address" value="'.$order['address'].'" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        ';
                                                                        echo '
                                                                            <div class="col-12 mt-4 mb-4">
                                                                                <h3>Thông tin mua hàng</h3>
                                                                                ';
                                                                        foreach($order_details as $ods)
                                                                        {
                                                                            if ($ods['order_id'] == $order['id'])
                                                                            {
                                                                                foreach($products as $prod)
                                                                                {
                                                                                    if ($ods['product_id'] == $prod['Id'])
                                                                                    {
                                                                                        echo '
                                                                                            <div class="d-flex justify-content-between align-items-center" style="background-color: aquamarine;">
                                                                                                <img class="p-4" src="'. _WEB_ROOT . $prod['Img'] .'" style="width: 100px; height: 100px;">
                                                                                                <div class="p-4">'. $prod['Title'] .'</div>
                                                                                                <div class="p-4">Số lượng: '. $ods['amount'] .'</div>
                                                                                                <div class="p-4">Đơn giá: $'. $ods['value'] .'</div>
                                                                                            </div>
                                                                                        ';
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        echo '
                                                                            <div class="d-flex justify-content-end align-items-center mt-2" style="background-color: aquamarine;">
                                                                                <div class="p-4">Tổng tiền: $'. $order['total_value']    .'</div>
                                                                                    <input type="hidden" name="total_value" value="'. $order['total_value'] .'">
                                                                                    <input type="hidden" name="total_amount" value="'. $order['total_amount'] .'">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        ';
                                                                    }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_3">
                                        <div class="ltn__myaccount-tab-content-inner mb-50">
                                            <h4>Thay Đổi Mật Khẩu</h4>
                                            <p>Đổi mật khẩu thường xuyên giúp nâng cao khả năng bảo mật tài khoản của bạn.</p>
                                            <div class="ltn__form-box">
                                                <form action="#">
                                                    <fieldset>
                                                        <!-- <legend>Password change</legend> -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Mật Khẩu Hiện Tại:</label>
                                                                <input type="password" name="ltn__name">
                                                                <label>Mật Khẩu Mới:</label>
                                                                <input type="password" name="ltn__lastname">
                                                                <label>Nhập Lại Mật Khẩu Mới:</label>
                                                                <input type="password" name="ltn__lastname">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="btn-wrapper">
                                                        <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Lưu Thay Đổi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_4">
                                        <div class="ltn__myaccount-tab-content-inner mb-50">
                                            <div class="ltn__form-box">
                                                <h4>Thay Đổi Địa Chỉ</h4>
                                                <form action="#">
                                                    <div class="row mb-50">
                                                        <div class="col-md-6">
                                                            <label>Tỉnh, thành phố:</label>
                                                            <div>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Kiên Giang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Quận, huyện:</label>
                                                            <div>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Kiên Giang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Phường, xã:</label>
                                                            <div>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Kiên Giang</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <label>Số nhà, tên đường: (Ghi rõ số nhà, tên đường, tầng, phòng)</label>
                                                            <input type="text" name="ltn__lastname" placeholder="Phòng E403 273 An Dương Vương">
                                                        </div>

                                                    </div>
                                                    <div class="btn-wrapper">
                                                        <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Lưu Thay Đổi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_5">
                                        <div class="ltn__myaccount-tab-content-inner mb-50">
                                            <h4>Thay Đổi Thông Tin</h4>
                                            <p>Thay đổi thông tin của bạn</p>
                                            <div class="ltn__form-box">
                                                <form action="#">
                                                    <div class="row mb-50">
                                                        <div class="col-md-6">
                                                            <label>Tên:</label>
                                                            <input type="text" name="ltn__name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Họ, Tên Đệm:</label>
                                                            <input type="text" name="ltn__lastname">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Số điện thoại:</label>
                                                            <input type="text" name="ltn__lastname" placeholder="(+84) 398755231">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Địa chỉ Email:</label>
                                                            <input type="email" name="ltn__lastname" placeholder="example@example.com">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Ngày Sinh:</label>
                                                            <div>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Kiên Giang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Tháng Sinh:</label>
                                                            <div>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Kiên Giang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Năm Sinh:</label>
                                                            <div>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Kiên Giang</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="btn-wrapper">
                                                        <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Lưu Thay Đổi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_6">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive">
                                                <h4>Sản Phẩm Yêu Thích</h4>
                                                <div id="table-scroll">
                                                <table class="table" id="order-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Hình Ảnh</th>
                                                            <th>Tên Sản Phẩm</th>
                                                            <th>Giá</th>
                                                            <th>Xem</th>
                                                            <th>Bỏ Thích</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 20%">
                                                                <div>
                                                                    <img style="width: 40px" src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/mau-tinh-yeu.jpg" alt="">
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">Màu Tình Yêu</td>
                                                            <td style="width: 20%">150K</td>
                                                            <td style="width: 15%"><a href="cart.html">View</a></td>
                                                            <td style="width: 15%"> <a href="cart.html"><i class="fa-solid fa-heart-circle-xmark"></i></i></a></td>
                                                        </tr>


                                                        
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT TAB AREA END -->
            </div>
        </div>
    </div>
</div>
<!-- WISHLIST AREA START -->

<!-- BRAND LOGO AREA START -->
<div class="ltn__brand-logo-area  ltn__brand-logo-1 section-bg-1 pt-35 pb-35 plr--5">
    <div class="container-fluid">
        <div class="row ltn__brand-logo-active">
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/brand-logo/1.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/brand-logo/2.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/brand-logo/3.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/brand-logo/4.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/brand-logo/5.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/brand-logo/1.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/brand-logo/2.png" alt="Brand Logo">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BRAND LOGO AREA END -->

<!-- MODAL ADD ADDRESSES -->
<!-- Modal -->
<div class="modal fade" id="myaccount-add-address-modal" tabindex="-1" role="dialog" aria-labelledby="myaccount-add-address-modal-Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title p-4" id="myaccount-add-address-modal-Label">Add your address</h5>
        <button id="btn-close-add-address-modal" type="button" class="close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-1">
        <form method="post" action="<?=_WEB_ROOT . "/User/SaveAddress"?>">
            <input type="hidden" name="id" value="<?=$customer[0]['Id']?>" >
            <input type="hidden" name="UserName" value="<?=$customer[0]['UserName']?>">
            <div class="form-group mt-1 d-flex flex-column">
                <label for="address-modal-select-province">Province: </label>
                <select name="province" id="address-modal-select-province">
                    <option value="" selected>Choose province</option>
                    <?php
                        foreach($provinces as $key => $province)
                        {
                            echo '<option value="'.$province['name'].'" data-province-id="'.$province['code'].'">'.$province['name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mt-1 d-flex flex-column">
                <label for="address-modal-select-district">District: </label>
                <select name="district" id="address-modal-select-district">

                </select>
            </div>
            <div class="form-group mt-1 d-flex flex-column">
                <label for="address-modal-select-ward">Ward: </label>
                <select name="ward" id="address-modal-select-ward">

                </select>
            </div>
            <div class="form-group mt-1 d-flex flex-column">
                <label for="address-modal-select-ward">Detail: </label>
                <input type="text" name="detail" placeholder="Enter Your Address detail">
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END -->

<style>
    /* style custom nice-select */
    /* .nice-select {
        width: 100%;
    }

    .list {
        max-height: 300px;
        overflow-y: scroll !important;
    } */
    #table-scroll {
        height: 400px;
        overflow-y: auto;
        overflow-x: auto;
    }
</style>