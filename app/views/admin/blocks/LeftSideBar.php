		<!-- LEFT MAIN SIDEBAR -->
		<div class="ec-left-sidebar ec-bg-sidebar">
			<div id="sidebar" class="sidebar ec-sidebar-footer">

				<div class="ec-brand">
					<a href="<?= _WEB_ROOT . '/Admin'?>" title="Ekka">
						<img class="ec-brand-icon" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/logo/ec-site-logo.png" alt="" />
						<span class="ec-brand-name text-truncate">Ekka</span>
					</a>
				</div>

				<!-- begin sidebar scrollbar -->
				<div class="ec-navigation" data-simplebar>
					<!-- sidebar menu -->
					<ul class="nav sidebar-inner" id="sidebar-menu">
						<!-- Dashboard -->
						<li class="active">
							<a class="sidenav-item-link" href="index.html">
								<i class="mdi mdi-slack"></i>
								<span class="nav-text">Bảng Điều Khiển</span>
							</a>
							<hr>
						</li>

						<!-- Vendors -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group-outline"></i>
								<span class="nav-text">Staff</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/employee?action=list'?>">
											<span class="nav-text">List Staff</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/employee?action=add'?>">
											<span class="nav-text">Add Staff</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/employee?action=list'?>">
											<span class="nav-text">Edit Staff</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- Users -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-comment-account"></i>
								<span class="nav-text">Customer</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="users" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/customer?action=list'?>">
											<span class="nav-text">List Customer</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/customer?action=add'?>">
											<span class="nav-text">Add Customer</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/customer?action=list'?>">
											<span class="nav-text">Edit Customer</span>
										</a>
									</li>
								</ul>
							</div>
							<hr>
						</li>

						<!-- Category -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-file-tree"></i>
								<span class="nav-text">Categories</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="<?php  echo _WEB_ROOT.'/admin/categories?action=list'?>">
											<span class="nav-text">List Category</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Products -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-flower-outline"></i>
								<span class="nav-text">Flowers</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/product?action=list'  ?>">
											<span class="nav-text">List Flower</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/product?action=add'  ?>">
											<span class="nav-text">Add Flower</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/product?action=list'  ?>">
											<span class="nav-text">Edit Flower</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Orders -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-shopify"></i>
								<span class="nav-text">Order</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
									<!-- <li class="">
										<a class="sidenav-item-link" href="< echo _WEB_ROOT.'/admin/order?action=new-order' ?>">
											<span class="nav-text">New Order</span>
										</a>
									</li>
									<li class=""> -->
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/order?action=list'?>">
											<span class="nav-text">List Order</span>
										</a>
									</li>
									<!-- <li class="">
										<a class="sidenav-item-link" href="< echo _WEB_ROOT.'/admin/order?action=detail&id=1' ?>">
											<span class="nav-text">Order Detail</span>
										</a>
									</li> -->
									<!-- <li class="">
										<a class="sidenav-item-link" href="< echo _WEB_ROOT.'/admin/order?action=invoice&id=1'?>">
											<span class="nav-text">Invoice</span>
										</a>
									</li> -->
								</ul>
							</div>
						</li>

						<!-- Import -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-shopify"></i>
								<span class="nav-text">Import</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/import?action=import' ?>">
											<span class="nav-text">Import</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/import?action=list'?>">
											<span class="nav-text">Import History</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Reviews -->
						<li>
							<a class="sidenav-item-link" href="<?php echo _WEB_ROOT.'/admin/review?action=list' ?>">
								<i class="mdi mdi-star-half"></i>
								<span class="nav-text">Review</span>
							</a>
						</li>

						<!-- Brands -->
						<li>
							<a class="sidenav-item-link" href="brand-list.html">
								<i class="mdi mdi-tag-faces"></i>
								<span class="nav-text">Thương Hiệu</span>
							</a>
							<hr>
						</li>

						<li>
							<a class="sidenav-item-link" href="brand-list.html">
								<i class="mdi mdi-chart-areaspline"></i>
								<span class="nav-text">Thống Kê</span>
							</a>
							<hr>
						</li>
					</ul>
				</div>
			</div>
		</div>