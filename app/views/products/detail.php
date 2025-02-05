<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner text-center">
                    <h1 class="ltn__page-title">Products</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ltn__shop-details-inner">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="ltn__shop-details-img-gallery ltn__shop-details-img-gallery-2 col-md-6">
                                <div class="ltn__shop-details-small-img slick-arrow-2">
                                    <!-- <div class="single-small-img">
                                        <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                    </div>
                                    <div class="single-small-img">
                                        <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                    </div>
                                    <div class="single-small-img">
                                        <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                    </div>
                                    <div class="single-small-img">
                                        <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                    </div>
                                    <div class="single-small-img">
                                        <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                    </div>
                                    <div class="single-small-img">
                                        <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                    </div>
                                    <div class="single-small-img">
                                        <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                    </div> -->

                                    <?php
                                        $j = 0;
                                        $count = count($sub_imgs_product);
                                        if ($count == 0) $count = 6;
                                        // var_dump($sub_imgs_product);
                                        // die;
                                        for ($i = 1; $i <= $count; $i++)
                                        {
                                            if (!empty($sub_imgs_product) && isset($sub_imgs_product[$j])  && $sub_imgs_product[$j]['thumb'] == $i) {
                                                echo '
                                                    <div class="single-small-img">
                                                        <img src="'. _WEB_ROOT .$sub_imgs_product[$j]['path'] .'">
                                                    </div>
                                                ';
                                                $j += 1;
                                            }
                                            else {
                                                echo '
                                                    <div class="single-small-img">
                                                        <img src="'. _WEB_ROOT . "/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" .'">
                                                    </div>
                                                ';
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="ltn__shop-details-large-img">
                                    <?php 
                                        if (isset($product['Img']) && $product['Img'] != "")
                                        {
                                            echo '
                                                <div class="single-large-img">
                                                    <a href="'. _WEB_ROOT  . $product['Img'] .'" data-rel="lightcase:myCollection">
                                                        <img src="' . _WEB_ROOT . $product['Img'] . '" alt="Image">
                                                    </a>
                                                </div>
                                            ';
                                        } else {
                                            echo '
                                                <div class="single-large-img">
                                                    <a href="' . _WEB_ROOT . "/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" . '" data-rel="lightcase:myCollection">
                                                        <img src="' . _WEB_ROOT . "/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" . '" alt="Image">
                                                    </a>
                                                </div>
                                            ';
                                        }
                                    ?>
                                    <?php
                                        $j = 0;
                                        $count = count($sub_imgs_product);
                                        // var_dump($count);
                                        // die;
                                        for ($i = 1; $i <= $count; $i++)
                                        {
                                            if (!empty($sub_imgs_product) && isset($sub_imgs_product[$j])  && $sub_imgs_product[$j]['thumb'] == $i) {
                                                echo '
                                                    <div class="single-large-img">
                                                        <a href="'. _WEB_ROOT .$sub_imgs_product[$j]['path'] .'" data-rel="lightcase:myCollection">
                                                            <img src="'. _WEB_ROOT .$sub_imgs_product[$j]['path'] .'">
                                                        </a>
                                                    </div>
                                                ';
                                                $j += 1;
                                            }
                                            else {
                                                echo '
                                                    <div class="single-large-img">
                                                        <a href="' . _WEB_ROOT . "/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" . '" data-rel="lightcase:myCollection">
                                                            <img src="'. _WEB_ROOT . "/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" .'" alt="Image">
                                                        </a>
                                                    </div>
                                                ';
                                            }
                                        }
                                    ?>
                                    <!-- <div class="single-large-img">
                                        <a href="img/product/1.png" data-rel="lightcase:myCollection">
                                            <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="single-large-img">
                                        <a href="img/product/2.png" data-rel="lightcase:myCollection">
                                            <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="single-large-img">
                                        <a href="img/product/3.png" data-rel="lightcase:myCollection">
                                            <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="single-large-img">
                                        <a href="img/product/4.png" data-rel="lightcase:myCollection">
                                            <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="single-large-img">
                                        <a href="img/product/5.png" data-rel="lightcase:myCollection">
                                            <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="single-large-img">
                                        <a href="img/product/6.png" data-rel="lightcase:myCollection">
                                            <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="single-large-img">
                                        <a href="img/product/7.png" data-rel="lightcase:myCollection">
                                            <img src="< echo _WEB_ROOT . '/' . $product['Img'] ?>" alt="Image">
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-info shop-details-info pl-0">
                                <h3><?php echo $product['Title'] ?></h3>
                                <div class="product-price-ratting mb-20">
                                    <ul>
                                        <li>
                                            <div class="product-price">
                                                <span><?php echo $product['Price'] ?>K</span>
                                                <del><?php echo $product['SalePrice'] ?>K</del>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-product-brief">
                                    <p style="text-align:justify"><?php echo $product['ShortDescription'] ?></p>
                                </div>

                                <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                    <ul>
                                        <li>
                                            <div class="cart-plus-minus">
                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="theme-btn-1 btn btn-effect-1 d-add-to-cart" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                <span>ADD TO CART</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-effect-1 d-add-to-wishlist" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__social-media mb-30">
                                    <ul>
                                        <li class="d-meta-title">Share:</li>
                                        <li><a href="https://www.facebook.com/kydingg/" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="https://www.facebook.com/kydingg/" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="https://www.facebook.com/kydingg/" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="https://www.facebook.com/kydingg/" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                        <!-- <li><a href="facebook.com/kydingg" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                            <li><a href="facebook.com/kydingg" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                            <li><a href="facebook.com/kydingg" title="Instagram"><i class="icon-social-instagram"></i></a></li> -->

                                    </ul>
                                </div>
                                <div class="modal-product-meta ltn__product-details-menu-1 mb-30">
                                    <ul>
                                        <li><strong>SKU:</strong> <span><?php echo $product['SKU'] ?></span></li>
                                        <li>
                                            <strong>Categories:</strong>
                                            <span>
                                            <?php
												foreach ($category as $cate) {
                                                    $flag = false;
													foreach ($sub_category as $subCate) {
														if ($cate['Id'] == $subCate['Parent']) {
															foreach($sub_category_product as $subCateFromDb)
															{
																if ($subCateFromDb['SubCategoryId'] == $subCate['Id'])
																{
                                                                    if ($flag == false)
                                                                    {
                                                                        echo '<div class="col-md-12" style="margin-left: 32px;">
                                                                                    <label class="form-label">' . $cate['Title'] . '</label>
                                                                                <div class="d-flex flex-wrap">
                                                                        ';
                                                                        $flag = true;
                                                                    }
																	echo '
																		<div class="d-flex flex-wrap" style="margin-left: 16px;">
																			<label class="add-product-cbx">
																				<span class="add-product-cbx-label-text">' . $subCate['Title'] . '</span>
																			</label>
																		</div>
																	';
																} 
															}
														}
													}
                                                }
                                            ?>

                                            </span>

                                    </ul>
                                </div>
                                <div class="ltn__safe-checkout d-none">
                                    <h5>Guaranteed Safe Checkout</h5>
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/icons/payment-2.png" alt="Payment Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->

<!-- SHOP DETAILS TAB AREA START -->
<div class="ltn__shop-details-tab-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__shop-details-tab-inner">

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                            <div class="ltn__shop-details-tab-content-inner text-center">
                                <h4>Thông tin sản phẩm</h4>
                                <p style="text-align: justify;"><?=$product['ShortDescription']?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="liton_tab_details_1_4">
                            <div class="ltn__shop-details-tab-content-inner">
                                <h4 class="title-2">Shipping policy for our store</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptates rerum neque ea libero numquam officiis ipsum, consectetur ducimus dicta in earum repellat sunt ab odit laboriosam cupiditate ipsam, doloremque.</p>
                                <ul>
                                    <li>1-2 business days (Typically by end of day)</li>
                                    <li><a href="#">30 days money back guaranty</a></li>
                                    <li>24/7 live support</li>
                                    <li>odio dignissim qui blandit praesent</li>
                                    <li>luptatum zzril delenit augue duis dolore</li>
                                    <li>te feugait nulla facilisi.</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, quia vel eligendi ipsam. Ea, quasi quam ducimus recusandae unde ipsa nam rem a minus tenetur quae sint voluptatem voluptate inventore.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="liton_tab_details_1_2">
                            <div class="ltn__shop-details-tab-content-inner">
                                <div class="customer-reviews-head text-center">
                                    <h4 class="title-2">Khách hàng đánh giá</h4>
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                            <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <!-- comment-area -->
                                        <div class="ltn__comment-area mb-30">
                                            <div class="ltn__comment-inner">
                                                <ul>
                                                    <li>
                                                        <div class="ltn__comment-item clearfix">
                                                            <div class="ltn__commenter-img">
                                                                <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/testimonial/1.jpg" alt="Image">
                                                            </div>
                                                            <div class="ltn__commenter-comment">
                                                                <h6><a href="#">Adam Smit</a></h6>
                                                                <div class="product-ratting">
                                                                    <ul>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                                <span class="ltn__comment-reply-btn">September 3, 2020</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="ltn__comment-item clearfix">
                                                            <div class="ltn__commenter-img">
                                                                <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/testimonial/3.jpg" alt="Image">
                                                            </div>
                                                            <div class="ltn__commenter-comment">
                                                                <h6><a href="#">Adam Smit</a></h6>
                                                                <div class="product-ratting">
                                                                    <ul>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                                <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="ltn__comment-item clearfix">
                                                            <div class="ltn__commenter-img">
                                                                <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/testimonial/2.jpg" alt="Image">
                                                            </div>
                                                            <div class="ltn__commenter-comment">
                                                                <h6><a href="#">Adam Smit</a></h6>
                                                                <div class="product-ratting">
                                                                    <ul>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                                <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <!-- comment-reply -->
                                        <div class="ltn__comment-reply-area ltn__form-box mb-60">
                                            <form action="#">
                                                <h4 class="title-2">Thêm đánh giá</h4>
                                                <div class="mb-30">
                                                    <div class="add-a-review">
                                                        <h6>Xếp hạng sản phẩm:</h6>
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                    <textarea placeholder="Gõ nhận xét của bạn...."></textarea>
                                                </div>
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" placeholder="Tên của bạn....">
                                                </div>
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" placeholder="Địa chỉ email....">
                                                </div>
                                                <label class="mb-0"><input type="checkbox" name="agree">Lưu tên và email của tôi trong trình duyệt này cho lần tôi bình luận tiếp theo.</label>
                                                <div class="btn-wrapper">
                                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS TAB AREA END -->

<!-- PRODUCT SLIDER AREA START -->
<div class="ltn__product-slider-area pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title section-title-border">related products</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__related-product-slider-one-active slick-arrow-1">

            <?php
            foreach ($relatedProduct as $rlp) {
            ?>
                <!-- ltn__product-item -->
                <div class="col-12">
                    <div class="ltn__product-item ltn__product-item-4">
                        <div class="product-img">
                            <a href="<?php echo _WEB_ROOT ?>"><img src="<?php echo _WEB_ROOT . '/' . $rlp['Img'] ?>" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="badge-2">10%</li>
                                </ul>
                            </div>
                            <!-- <div class="product-hover-action product-hover-action-3">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="icon-handbag"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="icon-shuffle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html"><?php echo $rlp['Title'] ?></a></h2>
                            <div class="product-price">
                                <span><?php echo $rlp['Price'] ?>K</span>
                                <del><?php echo $rlp['SalePrice'] ?>K</del>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->

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


<!-- MODAL AREA START (Quick View Modal) -->
<div class="ltn__modal-area ltn__quick-view-modal-area">
    <div class="modal fade" id="quick_view_modal" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <!-- <i class="fas fa-times"></i> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ltn__quick-view-modal-inner">
                        <div class="modal-product-item">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="modal-product-img">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/4.png" alt="#">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="modal-product-info shop-details-info pl-0">
                                        <h3>Pink Flower Tree Red</h3>
                                        <div class="product-price-ratting mb-20">
                                            <ul>
                                                <li>
                                                    <div class="product-price">
                                                        <span>$49.00</span>
                                                        <del>$65.00</del>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-product-brief">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos repellendus repudiandae incidunt quidem pariatur expedita, quo quis modi tempore non.</p>
                                        </div>
                                        <div class="modal-product-meta ltn__product-details-menu-1 mb-20">
                                            <ul>
                                                <li>
                                                    <div class="ltn__color-widget clearfix">
                                                        <strong class="d-meta-title">Color</strong>
                                                        <ul>
                                                            <li class="theme"><a href="#"></a></li>
                                                            <li class="green-2"><a href="#"></a></li>
                                                            <li class="blue-2"><a href="#"></a></li>
                                                            <li class="white"><a href="#"></a></li>
                                                            <li class="red"><a href="#"></a></li>
                                                            <li class="yellow"><a href="#"></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="ltn__size-widget clearfix mt-25">
                                                        <strong class="d-meta-title">Size</strong>
                                                        <ul>
                                                            <li><a href="#">S</a></li>
                                                            <li><a href="#">M</a></li>
                                                            <li><a href="#">L</a></li>
                                                            <li><a href="#">XL</a></li>
                                                            <li><a href="#">XXL</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                            <ul>
                                                <li>
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="#" class="theme-btn-1 btn btn-effect-1 d-add-to-cart" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                        <span>ADD TO CART</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-effect-1 d-add-to-wishlist" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                        <i class="icon-heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ltn__social-media mb-30">
                                            <ul>
                                                <li class="d-meta-title">Share:</li>
                                                <li><a href="#" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                                <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                                <li><a href="#" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                                <li><a href="#" title="Instagram"><i class="icon-social-instagram"></i></a></li>

                                            </ul>
                                        </div>
                                        <div class="modal-product-meta ltn__product-details-menu-1 mb-30 d-none">
                                            <ul>
                                                <li><strong>SKU:</strong> <span>12345</span></li>
                                                <li>
                                                    <strong>Categories:</strong>
                                                    <span>
                                                        <a href="#">Flower</a>
                                                    </span>
                                                </li>
                                                <li>
                                                    <strong>Tags:</strong>
                                                    <span>
                                                        <a href="#">Love</a>
                                                        <a href="#">Flower</a>
                                                        <a href="#">Heart</a>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ltn__safe-checkout d-none">
                                            <h5>Guaranteed Safe Checkout</h5>
                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/icons/payment-2.png" alt="Payment Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL AREA END -->

<!-- MODAL AREA START (Add To Cart Modal) -->
<div class="ltn__modal-area ltn__add-to-cart-modal-area">
    <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ltn__quick-view-modal-inner">
                        <div class="modal-product-item">
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-add-to-cart-content clearfix">
                                        <div class="modal-product-img">
                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/1.png" alt="#">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5><a href="product-details.html">Heart's Desire</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Cart</p>
                                            <div class="btn-wrapper">
                                                <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- additional-info -->
                                    <div class="additional-info d-none--">
                                        <p>We want to give you <b>10% discount</b> for your first order, <br> Use (fiama10) discount code at checkout</p>
                                        <div class="payment-method">
                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/icons/payment.png" alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL AREA END -->

<!-- MODAL AREA START (Wishlist Modal) -->
<div class="ltn__modal-area ltn__add-to-cart-modal-area">
    <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ltn__quick-view-modal-inner">
                        <div class="modal-product-item">
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-product-img">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/7.png" alt="#">
                                    </div>
                                    <div class="modal-product-info">
                                        <h5><a href="product-details.html">Brake Conversion Kit</a></h5>
                                        <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Wishlist</p>
                                        <div class="btn-wrapper">
                                            <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                        </div>
                                    </div>
                                    <!-- additional-info -->
                                    <div class="additional-info d-none">
                                        <p>We want to give you <b>10% discount</b> for your first order, <br> Use discount code at checkout</p>
                                        <div class="payment-method">
                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/icons/payment.png" alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL AREA END -->