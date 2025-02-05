			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2">
						<h1>Đơn hàng</h1>
						<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>History
						</p>
						
						
					</div>
					<?php
							if (isset($arrInfoFilter))
							{
								echo '<p class="breadcrumbs">Filter: Tình trạng: '.$arrInfoFilter['status'].', Từ ngày: '.$arrInfoFilter['fromDate'].', Đến ngày: '.$arrInfoFilter['toDate'].', Tỉnh/TP: '.$arrInfoFilter['province'].', Q/H: '.$arrInfoFilter['district'].', X/P: '.$arrInfoFilter['ward'].'</p>';
							}
						?>
					<form class="mt-4 mb-4" method="post" action="<?=_WEB_ROOT?>/Admin/ViewFilterOrder">
						<div class="row" style="background-color: #c6e2ff;">
							<div class="col-12">
								<div class="d-flex flex-column justify-content-around align-items-start p-4">
									<div>
										<label>Tình trạng đơn hàng</label>
										<select name="status">
											<option value="">All</option>
											<option value="pending">Pending</option>
											<option value="verified">Verified</option>
											<option value="delivering">Delivering</option>
											<option value="done">Done</option>
											<option value="canceled">Canceled</option>
										</select>
									</div>
									<div>
										<label>Thời gian giao hàng: </label>
										<div class="d-flex ml-4">
											<div>
												<label>Từ ngày</label>
												<input type="date" name="fromDate">
											</div>
											<div>
												<label>Đến ngày</label>
												<input type="date" name="toDate">
											</div>
										</div>
									</div>
									<div>
										<label>Địa điểm giao hàng: </label>
										<div class="d-flex flex-column ml-4">
											<div>
												<label for="address-modal-select-province">Tỉnh/Thành phố: </label>
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
											<div>
												<label for="address-modal-select-district">Quận/Huyện: </label>
												<select name="district" id="address-modal-select-district">

												</select>
											</div>
											<div>
												<label for="address-modal-select-ward">Xã/Phường: </label>
												<select name="ward" id="address-modal-select-ward">

												</select>
											</div>
										</div>
									</div>
									<button class="btn btn-primary">Go</button>
								</div>
							</div>
						</div>
					</form>
					<div class="container">
						<div class="row">
							<?php
								foreach($orders as $order)
								{
									foreach($customers as $customer)
									{
										if ($order['customer_id'] == $customer['Id'])
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
															<input type="hidden" name="customer_id" value="'. $customer['Id'] .'">
															<div class="col-3 d-flex flex-column">
																<label for="order-pay-user-info-name">Tên</label>
																<input class="form-input" value="' . $customer['FirstName'] . " " . $customer['LastName'] . '" disabled>
															</div>
															<div class="col-3 d-flex flex-column">
																<label for="order-pay-user-info-phone">Số điện thoại</label>
																<input class="form-input" name="phone" value="'. $order['phone'] .'" disabled>
															</div>
															<div class="col-6 d-flex flex-column">
																<label for="order-pay-user-info-address">Địa chỉ</label>
																<input class="form-input" name="address" value="'.$order['address_detail'].', '.$order['ward'].', '.$order['district'].', '.$order['province'].'" disabled>
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
											';
											$btnStatus = "";
											$btnPaid = "";
											$btnCancel = "";
											if ($order['status'] == "pending")
											{
												$btnStatus = '<button class="btn btn-success btnVerifyOrder" data-order-id="'.$order['id'].'" data-customer-id="'.$customer['Id'].'">Xác nhận đơn hàng</button>';
											} else if ($order['status'] == "verified")
											{
												$btnStatus = '<button class="btn btn-success btnDeliverOrder" data-order-id="'.$order['id'].'" data-customer-id="'.$customer['Id'].'">Tiến hành giao hàng</button>';
											} else if ($order['status'] == "delivering")
											{
												$btnStatus = '<button class="btn btn-success btnVerifyDoneOrder" id="" data-order-id="'.$order['id'].'" data-customer-id="'.$customer['Id'].'">Xác nhận đã hoàn tất</button>';
											} else if ($order['status'] == "canceled")
											{
												$btnStatus = '<button class="btn btn-secondary" onclick="" disable>Đã hủy</button>';
											} else
											{
												$btnStatus = '<button class="btn btn-success" onclick="" disable>Đã hoàn thành</button>';
											}

											if ($order['status'] == "canceled")
											{
												$btnPaid = "";
											} else if ($order['paid'] == 0)
											{
												$btnPaid = '<button class="btn btn-primary btnVerifyPaymentOrder" id="" data-order-id="'.$order['id'].'" data-customer-id="'.$customer['Id'].'">Xác nhận đã thanh toán</button>';
											} else {
												$btnPaid = '<button class="btn btn-success" onclick="" disable>Đã thanh toán</button>';
											}

											if ($order['status'] != "canceled" && ($order['status'] != "done"))
											{
												$btnCancel = '<button class="btn btn-danger btnCancelOrder" id="" data-order-id="'.$order['id'].'" data-customer-id="'.$customer['Id'].'">Hủy đơn hàng</button>';
											}
											echo '
												<div class="col-12 mt-4 mb-4">
													<h3>Hình thức thanh toán</h3>
													<div class="d-flex justify-content-around align-items-center p-4" style="background-color:beige;">
														<p>'.$order['payment_method'].'</p>
													</div>
													<div class="d-flex justify-content-around align-items-center mt-3">
														'.$btnCancel.'
														'.$btnStatus.'
														'.$btnPaid.'
													</div>
												</div>
												</div>
											';
										}
									}
								}
							?>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->