			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2">
						<h1>Lịch sử nhập hàng</h1>
						<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>History
						</p>
					</div>
					<div class="row">
						<?php
							if (empty($importInvoices))
							{
								echo "Chưa có lịch sử nhập hàng";
							} else {
								foreach($importInvoices as $ii)
								{
									echo '
										<div class="col-12 p-2 mt-5 mb-5 border" style="border-color: #000!important; background-color: #c6e2ff;">
											<h2>ID: '. $ii['id'] .'</h2>
											<div class="d-flex">
												<div class="col-md-4">
													<div class="form-group m-4">
														<label for="import-list-invoice-date">Ngày</label>
														<div>
															<input type="text" class="form-control" id="import-list-invoice-date" value="'. $ii['date'] .'" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group m-4">
														<label for="import-list-invoice-amount">Số lượng</label>
														<div>
															<input type="text" class="form-control" id="import-list-invoice-amount" value="'. $ii['amount'] .'" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group m-4">
														<label for="import-list-invoice-totalValue">Giá trị</label>
														<div>
															<input type="text" class="form-control" id="import-list-invoice-totalValue" value="$'. $ii['total_value'] .'" readonly>
														</div>
													</div>
												</div>
											</div>
									';
									foreach($importInvoiceDetails as $iid)
									{
										foreach($products as $prod)
										{
											if ($ii['id'] == $iid['import_invoice_id'] && $iid['product_id'] == $prod['Id'])
											{
												echo '
													<div class="col-12 ms-2 mr-2 mt-5 p-4 import-list-invoice-detail" style="background-color: #9cc0c5;">
														<div class="row mb-2">
															<div class="col-lg-12">
																<div class="form-group">
																	<label for="import-list-invoice-detail-prod-title">Sản phẩm</label>
																	<div>
																		<input type="text" class="form-control" id="import-list-invoice-detail-prod-title" value="'. $prod['Title'] .'" readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class="row mb-2">
															<div class="col-lg-6">
																<div class="form-group">
																	<label for="import-list-invoice-detail-amount">Số lượng</label>
																	<input type="text" class="form-control import-list-invoice-detail-amount" id="" value="'. $iid['amount'] .'" >
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label for="import-list-invoice-detail-value">Giá ($)</label>
																	<input type="text" class="form-control import-list-invoice-detail-value" id="" value="'. $iid['value'] .'" >
																</div>
															</div>
														</div>
														<div class="row mb-2">
															<div class="d-flex justify-content-end">
																<button class="btn btn-primary import-list-invoice-detail-btn-change" data-import-invoice-id="'. $ii['id'] .'" data-product-id="'. $prod['Id'] .'">Save changes</button>	
															</div>
														</div>
													</div>
												';
											}
										}
									}
									echo '</div>';
								}
							}
						?>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->