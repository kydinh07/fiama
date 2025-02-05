<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
	<div class="content">
		<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
			<div>
				<h1>Add Flower</h1>
				<p class="breadcrumbs"><span><a href="index.html">Admin</a></span>
					<span><i class="mdi mdi-chevron-right"></i></span>Flower
				</p>
			</div>
			<div>
				<a href="<?= _WEB_ROOT ?>/admin/product?action=list" class="btn btn-primary"> View All Flower
				</a>
			</div>
		</div>
		<form action="<?= _WEB_ROOT ?>/Admin/SaveProduct" enctype="multipart/form-data" method="post">
			<div class="row">
				<div class="col-12">
					<div class="card card-default">
						<div class="card-header card-header-border-bottom">
							<h2>Add Flower</h2>
						</div>

						<div class="card-body">
							<div class="row ec-vendor-uploads">
								<div class="col-lg-4">
									<div class="ec-vendor-img-upload">
										<div class="ec-vendor-main-img">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload" name="thumb0" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
												</div>
												<div class="avatar-preview ec-preview">
													<div class="imagePreview ec-div-preview">
														<img class="ec-image-preview" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" alt="edit" />
													</div>
												</div>
											</div>
											<div class="thumb-upload-set colo-md-12">
												<div class="thumb-upload">
													<div class="thumb-edit">
														<input type='file' id="thumbUpload01" name="thumb1" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
													</div>
													<div class="thumb-preview ec-preview">
														<div class="image-thumb-preview">
															<img class="image-thumb-preview ec-image-preview" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" alt="edit" />
														</div>
													</div>
												</div>
												<div class="thumb-upload">
													<div class="thumb-edit">
														<input type='file' id="thumbUpload02" name="thumb2" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
													</div>
													<div class="thumb-preview ec-preview">
														<div class="image-thumb-preview">
															<img class="image-thumb-preview ec-image-preview" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" alt="edit" />
														</div>
													</div>
												</div>
												<div class="thumb-upload">
													<div class="thumb-edit">
														<input type='file' id="thumbUpload03" name="thumb3" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
													</div>
													<div class="thumb-preview ec-preview">
														<div class="image-thumb-preview">
															<img class="image-thumb-preview ec-image-preview" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" alt="edit" />
														</div>
													</div>
												</div>
												<div class="thumb-upload">
													<div class="thumb-edit">
														<input type='file' id="thumbUpload04" name="thumb4" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
													</div>
													<div class="thumb-preview ec-preview">
														<div class="image-thumb-preview">
															<img class="image-thumb-preview ec-image-preview" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" alt="edit" />
														</div>
													</div>
												</div>
												<div class="thumb-upload">
													<div class="thumb-edit">
														<input type='file' id="thumbUpload05" name="thumb5" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
													</div>
													<div class="thumb-preview ec-preview">
														<div class="image-thumb-preview">
															<img class="image-thumb-preview ec-image-preview" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" alt="edit" />
														</div>
													</div>
												</div>
												<div class="thumb-upload">
													<div class="thumb-edit">
														<input type='file' id="thumbUpload06" name="thumb6" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
													</div>
													<div class="thumb-preview ec-preview">
														<div class="image-thumb-preview">
															<img class="image-thumb-preview ec-image-preview" src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" alt="edit" />
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="ec-vendor-upload-detail">
										<div class="row g-3">
											<div class="col-md-12">
												<label for="inputEmail4" class="form-label">Flower Name</label>
												<input type="text" name="Title" class="form-control slug-title" id="inputEmail4">
											</div>
											<div class="col-md-12">
												<label class="form-label">Choose categories</label>

												<?php
												foreach ($category as $cate) {
													echo '<div class="col-md-12" style="margin-left: 32px;">
														<label class="form-label">' . $cate['Title'] . '</label>
														<div class="d-flex flex-wrap">
													';
													foreach ($sub_category as $subCate) {
														if ($cate['Id'] == $subCate['Parent']) {
															echo '
															<div class="d-flex flex-wrap" style="margin-left: 16px;">
																<label class="add-product-cbx">
																	<input type="checkbox" name="subCate[]" value="' . $subCate['Id'] . '">
																	<span class="add-product-cbx-label-text">' . $subCate['Title'] . '</span>
																</label>
															</div>
														';
														}
													}
													echo '</div>
														</div>
													';
												}
												?>
											</div>
											<div class="col-md-12">
												<label for="slug" class="col-12 col-form-label">SKU CODE</label>
												<div class="col-12">
													<input id="slug" name="SKU" class="form-control here set-slug" type="text">
												</div>
											</div>
											<div class="col-md-12">
												<label class="form-label">Short Description</label>
												<textarea name="ShortDescription" class="form-control" rows="2"></textarea>
											</div>
											<div class="col-md-12">
												<label class="form-label">Quantity</label>
												<input type="number" name="Quantity" class="form-control" id="quantity1">
											</div>
											<div class="col-md-6">
												<label class="form-label">SalePrice <span>( In $
														)</span></label>
												<input type="number" name="SalePrice" class="form-control" id="price1">
											</div>
											<div class="col-md-6">
												<label class="form-label">Price <span>( In $
														)</span></label>
												<input type="number" name="Price" class="form-control" id="price1">
											</div>

											<div class="col-md-6">
												<label for="Position">Hot</label>
												<div>
													<select class="form-select" name="Hot" id="select-position">
														<option value="1" selected>Yes</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>

											<!-- <div class="col-md-12">
											<label class="form-label">Product Details</label>
											<textarea class="form-control" rows="4"></textarea>
										</div> -->
											<div class="col-md-12 d-flex justify-content-end" style="margin-top: 32px;">
												<!-- <form action="" method="post"> -->
												<button type="submit" class="btn btn-primary">Add Flower</button>
												<!-- </form> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</form>
	</div> <!-- End Content -->
</div> <!-- End Content Wrapper -->