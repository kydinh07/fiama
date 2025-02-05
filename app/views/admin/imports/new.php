			<?php
				// var_dump($products);
				// die;
			?>
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
			    <div class="content">
			        <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
			            <h1>Nhập hàng</h1>
			            <p class="breadcrumbs"><span><a href="index.html">Admin</a></span>
			                <span><i class="mdi mdi-chevron-right"></i></span>Import
			            </p>
			        </div>
					<div class="btn-wrapper mb-5 mt-5">
						<button id="import-add-import-btn" class="btn btn-primary">Nhập thêm 1 sản phẩm</button>
                	</div>
					<form method="post" action="<?=_WEB_ROOT . "/Admin/handleImportProducts"?>">
						<div class="row" id="import-new-details-wrapper">
							<div class="col-12 mb-5" style="background-color: aliceblue;">
								<div class="row mb-2">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="import-select-product">Chọn sản phẩm</label>
											<div>
											<select class="form-select" name="product_id[]" id="import-select-product">
												<?php
													if (isset($products) && !empty($products))
													{
														foreach($products as $product)
														{
															echo '<option value="'. $product['Id'] .'">'. $product['Title'] .'</option>';
														}
													}
												?>
											</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="import-input-amount">Số lượng</label>
											<input type="text" class="form-control" id="import-input-amount" name="amount[]" placeholder="Số lượng">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="import-input-value">Giá</label>
											<input type="text" class="form-control" id="import-input-value" name="value[]" placeholder="Giá">
										</div>
									</div>
								</div>
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Nhập</button>
					</form>
			    </div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->