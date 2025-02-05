<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner text-center">
                    <h1 class="ltn__page-title"><?php echo strtoupper($pageTitle) ?></h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><?php echo ucfirst(strtolower($pageTitle)) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-2 mb-100">
                <div class="ltn__shop-options">
                    <ul>
                        <li>
                            <div class="showing-product-number text-right">
                                <span>Showing <?php echo $show . ' of ' . $subShow ?> results</span>
                            </div>
                        </li>
                        <li>
                            <div class="short-by text-center">
                                <form action="" method="get">

                                    <?php

                                    if (!empty($_GET['low']) && !empty($_GET['high'])) {
                                        echo '  <input type="hidden" name="low" value="' . $_GET['low'] . '" />';
                                        echo '  <input type="hidden" name="high" value="' . $_GET['high'] . '" />';
                                    }
                                    ?>

                                    <select class="nice-select" name="sort" onchange="this.form.submit()">
                                        <option <?php if (!empty($_GET['sort'])) {
                                                    echo ($_GET['sort'] == 1) ? "Selected " : "";
                                                } ?> value="1">Default sorting</option>
                                        <option <?php if (!empty($_GET['sort'])) {
                                                    echo ($_GET['sort'] == 2) ? "Selected " : "";
                                                } ?>value="2">Sort by popularity</option>
                                        <option <?php if (!empty($_GET['sort'])) {
                                                    echo ($_GET['sort'] == 3) ? "Selected " : "";
                                                } ?>value="3">Sort by new arrivals</option>
                                        <option <?php if (!empty($_GET['sort'])) {
                                                    echo ($_GET['sort'] == 4) ? "Selected " : "";
                                                } ?>value="4">Sort by price: low to high</option>
                                        <option <?php if (!empty($_GET['sort'])) {
                                                    echo ($_GET['sort'] == 5) ? "Selected " : "";
                                                } ?>value="5">Sort by price: high to low</option>
                                    </select>
                                </form>
                            </div>
                            <div class="ltn__grid-list-tab-menu ">
                                <div class="nav">
                                    <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="icon-grid"></i></a>
                                    <a data-bs-toggle="tab" href="#liton_product_list"><i class="icon-menu"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">

                                <!-- Render listProduct -->
                                <?php
                                foreach ($listProduct as $lps) {
                                ?>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="<?php echo _WEB_ROOT . '/' . $category[0]['Path'] . '/' . $lps['Path'] ?>"><img style="height: 420px;" src="<?php echo _WEB_ROOT ?>/<?php echo $lps['Img'] ?>" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <?php
                                                        if ($lps['Discount'] > 10)
                                                            echo '<li class="badge-2">' . $lps['Discount'] . '% </li>';
                                                        else
                                                            echo '<li class="badge-1">Hot</li>';
                                                        ?>

                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" id="AddToCart" title="Add to Cart" data-product-id="<?= $lps['Id'] ?>" data-username="<?= $_SESSION['currentUser']['username'] ?>" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                                <i class="icon-heart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html"> <?php echo $lps['Title'] ?> </a></h2>
                                                <div class="product-price">
                                                    <span><?php echo $lps['Price'] . 'K' ?></span>
                                                    <del><?php echo $lps['SalePrice'] ?>K</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                                }
                                ?>

                                <!--  -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="ltn__pagination-area text-center">
                    <div class="ltn__pagination ltn__pagination-2">
                        <ul>
                            <li><a href="
                            <?php 
                                echo _WEB_ROOT
                                . '/' .  (!empty($category[0]['Path']) ? $category[0]['Path']:'tat-ca-san-pham' )
                                . '?'
                                . (!empty($_GET['sort']) ? "sort=" . $_GET['sort'] . "&" : "")
                                . ((!empty($_GET['low']) && !empty($_GET['high'])) ? "low=" . $_GET['low'] . "&high=" . $_GET['high'] . "&" : "")
                                . (!empty($_GET['search'])? "search=". $_GET['search']."&" : "")
                                . 'page=1'; 
                            ?>
                            "><i class="icon-arrow-left"></i></a></li>
                            <!-- Render page -->
                            <?php
                            for ($i = 1; $i <= $pageCount; $i++) {
                            ?>
                                <li <?php if ($i == $pageActive) echo 'class="active"'  ?>>
                                    <a href="
                                     <?php echo _WEB_ROOT
                                            . '/' .  (!empty($category[0]['Path']) ? $category[0]['Path']:'tat-ca-san-pham' )
                                            . '?'
                                            . (!empty($_GET['sort']) ? "sort=" . $_GET['sort'] . "&" : "")
                                            . ((!empty($_GET['low']) && !empty($_GET['high'])) ? "low=" . $_GET['low'] . "&high=" . $_GET['high'] . "&" : "")
                                            . (!empty($_GET['search'])? "search=". $_GET['search']."&" : "")
                                            . 'page=' . $i;
                                        ?> ">
                                        <?php echo $i ?>
                                    </a>

                                </li>
                            <?php
                                 }
                            ?>

                            <li><a href="<?php 
                             echo _WEB_ROOT
                             . '/' .  (!empty($category[0]['Path']) ? $category[0]['Path']:'tat-ca-san-pham' )
                             . '?'
                             . (!empty($_GET['sort']) ? "sort=" . $_GET['sort'] . "&" : "")
                             . ((!empty($_GET['low']) && !empty($_GET['high'])) ? "low=" . $_GET['low'] . "&high=" . $_GET['high'] . "&" : "")
                             . (!empty($_GET['search'])? "search=". $_GET['search']."&" : "")
                             . 'page=' .$pageCount; 
                            
                            ?>"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  mb-100">
                <aside class="sidebar ltn__shop-sidebar">
                    <!-- Search Widget -->
                    <div class="widget ltn__search-widget">
                        <form action="#" method="get">
                            <input type="text" name="search" placeholder="<?php if ($search != '') echo $search;
                                                                            else echo "Search your keyword..."; ?>">
                            <button type="submit"><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                    <!-- Price Filter Widget -->
                    <div class="widget ltn__price-filter-widget">
                        <h4 class="ltn__widget-title">Price</h4>
                        <div class="price_filter">
                            <form id="form-price" action="<?php echo _WEB_ROOT . $_SERVER['PATH_INFO'] ?>" method="get">

                                <?php
                                if (!empty($_GET['sort'])) {
                                    echo '  <input type="hidden" name="sort" value="' . $_GET['sort'] . '" />';
                                }
                                ?>
                                <input type="text" name="low" value="50" />
                                <input type="text" name="high" value="2000" />
                                <input type="submit" value="Filter" />
                                <a href="<?php echo _WEB_ROOT . $_SERVER['PATH_INFO'] ?>">Reset Filter</a>
                            </form>
                        </div>
                    </div>
                    <!-- Category Widget -->
                    <div class="widget ltn__menu-widget">
                        <h4 class="ltn__widget-title">categories</h4>
                        <ul>

                            <!-- Render left category -->

                            <?php
                            foreach ($listCategory as $lctgr) {
                            ?>
                                <li><a href="<?php echo $lctgr['Path'] ?>"><?php echo $lctgr['Title']  ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Color Widget -->
                    <!-- <div class="widget ltn__color-widget">
                        <h4 class="ltn__widget-title">Color</h4>
                        <ul>
                            <li class="theme"><a href="#"></a></li>
                            <li class="green-2"><a href="#"></a></li>
                            <li class="blue-2"><a href="#"></a></li>
                            <li class="white"><a href="#"></a></li>
                            <li class="red"><a href="#"></a></li>
                            <li class="yellow"><a href="#"></a></li>

                            <li class="black"><a href="#"></a></li>
                                <li class="silver"><a href="#"></a></li>
                                <li class="gray"><a href="#"></a></li>
                                <li class="maroon"><a href="#"></a></li>
                                <li class="olive"><a href="#"></a></li>
                                <li class="lime"><a href="#"></a></li>
                                <li class="aqua"><a href="#"></a></li>
                                <li class="teal"><a href="#"></a></li>
                                <li class="blue"><a href="#"></a></li>
                                <li class="navy"><a href="#"></a></li>
                                <li class="fuchsia"><a href="#"></a></li>
                                <li class="purple"><a href="#"></a></li>
                                <li class="pink"><a href="#"></a></li>
                                <li class="nude"><a href="#"></a></li>
                                <li class="orange"><a href="#"></a></li>
                        </ul>
                    </div> -->
                    <!-- Size Widget -->
                    <!-- <div class="widget ltn__size-widget">
                        <h4 class="ltn__widget-title">Size</h4>
                        <ul>
                            <li><a href="#">S</a></li>
                            <li><a href="#">M</a></li>
                            <li><a href="#">L</a></li>
                            <li><a href="#">XL</a></li>
                            <li><a href="#">XXL</a></li>
                        </ul>
                    </div> -->
                    <!-- Tagcloud Widget -->
                    <div class="widget ltn__tagcloud-widget">
                        <h4 class="ltn__widget-title">Tags</h4>
                        <ul>
                            <li><a href="#">Popular</a></li>
                            <li><a href="#">desgin</a></li>
                            <li><a href="#">ux</a></li>
                            <li><a href="#">usability</a></li>
                            <li><a href="#">develop</a></li>
                            <li><a href="#">icon</a></li>
                            <li><a href="#">Car</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Repairs</a></li>
                            <li><a href="#">Auto Parts</a></li>
                            <li><a href="#">Oil</a></li>
                            <li><a href="#">Dealer</a></li>
                            <li><a href="#">Oil Change</a></li>
                            <li><a href="#">Body Color</a></li>
                        </ul>
                    </div>
                    <!-- Top Rated Product Widget -->
                    <div class="widget ltn__top-rated-product-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border---">Top Rated Product</h4>
                        <ul>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/1.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Mixel Solid Seat Cover</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/2.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Brake Conversion Kit</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/3.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Coil Spring Conversion</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Banner Widget -->
                    <div class="widget ltn__banner-widget d-none">
                        <a href="shop.html"><img src="<?php echo _WEB_ROOT ?>/public/assets/clients/#" alt="#"></a>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->

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