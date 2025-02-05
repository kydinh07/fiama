<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
	<div class="content">
		<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
			<div>
				<h1>Edit Flower</h1>
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
			<input type="hidden" name="id" value="<?=$product[0]['Id']?>"/>
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
													<label for="imageUpload">
														<img src="<?php echo _WEB_ROOT ?>/public/assets/admin/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
													</label>
												</div>
												<div class="avatar-preview ec-preview">
													<div class="imagePreview ec-div-preview">
														<?php 
															if (isset($product[0]['Img']) && $product[0]['Img'] != "")
															{
																echo '<img class="ec-image-preview" src="'. _WEB_ROOT . $product[0]['Img'] .'" alt="edit" />';
															} else {
																echo '<img class="ec-image-preview" src="'. _WEB_ROOT . "/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" .'" alt="edit" />';
															}
														?>
														
													</div>
												</div>
											</div>
											<div class="thumb-upload-set colo-md-12">
												<?php
													$j = 0;
													for ($i = 1; $i <= 6; $i++)
													{
														if (!empty($sub_imgs_product) && isset($sub_imgs_product[$j])  && $sub_imgs_product[$j]['thumb'] == $i) {
															echo '
																<div class="thumb-upload">
																	<div class="thumb-edit">
																		<input type="file" id="thumbUpload01" name="thumb'.$i.'" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
																		<label for="imageUpload">
																			<img src="' . _WEB_ROOT . "/public/assets/admin/img/icons/edit.svg" .'" class="svg_img header_svg" alt="edit" />
																		</label>
																	</div>
																	<div class="thumb-preview ec-preview">
																		<div class="image-thumb-preview">
																			<img class="image-thumb-preview ec-image-preview" src="'. _WEB_ROOT .$sub_imgs_product[$j]['path'] .'" alt="edit" />
																		</div>
																	</div>
																</div>
															';
															$j += 1;
														}
														else {
															echo '
																<div class="thumb-upload">
																	<div class="thumb-edit">
																		<input type="file" id="thumbUpload01" name="thumb'.$i.'" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
																		<label for="imageUpload">
																			<img src="' . _WEB_ROOT . "/public/assets/admin/img/icons/edit.svg" .'" class="svg_img header_svg" alt="edit" />
																			
																		</label>
																	</div>
																	<div class="thumb-preview ec-preview">
																		<div class="image-thumb-preview">
																			<img class="image-thumb-preview ec-image-preview" src="' . _WEB_ROOT . "/public/assets/admin/img/products/vender-upload-thumb-preview.jpg" .'" alt="edit" />
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
								<div class="col-lg-8">
									<div class="ec-vendor-upload-detail">
										<div class="row g-3">
											<div class="col-md-12">
												<label for="inputEmail4" class="form-label">Flower Name</label>
												<input type="text" name="Title" class="form-control slug-title" id="inputEmail4" value="<?=$product[0]['Title']?>">
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
															$hasSubCate = false;
															foreach($sub_category_product as $subCateFromDb)
															{
																if ($subCateFromDb['SubCategoryId'] == $subCate['Id'])
																{
																	echo '
																		<div class="d-flex flex-wrap" style="margin-left: 16px;">
																			<label class="add-product-cbx">
																				<input type="checkbox" name="subCate[]" value="' . $subCate['Id'] . '" checked>
																				<span class="add-product-cbx-label-text">' . $subCate['Title'] . '</span>
																			</label>
																		</div>
																	';
																	$hasSubCate = true;
																} 
															}
															if (!$hasSubCate)
															{
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
													<input id="slug" name="SKU" class="form-control here set-slug" type="text" value="<?=$product[0]['SKU']?>">
												</div>
											</div>
											<div class="col-md-12">
												<label class="form-label">Short Description</label>
												<textarea name="ShortDescription" class="form-control" rows="2"><?=$product[0]['ShortDescription']?></textarea>
											</div>
											<div class="col-md-6 mt-2">
												<label class="form-label">Storage</label>
												<div class="d-flex">
													<input type="number" class="form-control" id="edit-product-storage" value="<?=$storage?>" readonly>
												</div>
											</div>
											<div class="col-md-6 mt-2">
												<label class="form-label">Storage At Date</label>
												<div class="d-flex">
													<input type="date" id="productStorageDateSelect" data-product-id="<?=$product[0]['Id']?>" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<label class="form-label">SalePrice <span>( $ unit
														)</span></label>
												<input type="number" name="SalePrice" class="form-control" id="price1" value="<?=$product[0]['SalePrice']?>">
											</div>
											<div class="col-md-6">
												<label class="form-label">Price <span>( $ unit
														)</span></label>
												<input type="number" name="Price" class="form-control" id="price1" value="<?=$product[0]['Price']?>">
											</div>

											<div class="col-md-6">
												<label for="Position">Hot</label>
												<div>
													<select class="form-select" name="Hot" id="select-position">
														<?php
															if ($product[0]['Hot'] == 1)
															{
																echo '
																	<option value="1" selected>Yes</option>
																	<option value="0">No</option>
																';
															} else {
																echo '
																	<option value="1">Yes</option>
																	<option value="0" selected>No</option>
																';
															}
														?>
														
													</select>
												</div>
											</div>

											<div class="col-md-6">
												<label for="status" class="col-12 col-form-label">Status</label>
												<div class="">
													<input id="status" class="form-control" type="text" value="<?=$product[0]['status']?>">
												</div>
											</div>

											<!-- <div class="col-md-12">
											<label class="form-label">Product Details</label>
											<textarea class="form-control" rows="4"></textarea>
										</div> -->
											<div class="col-md-12 d-flex justify-content-end" style="margin-top: 32px;">
												<!-- <form action="" method="post"> -->
												<button type="submit" class="btn btn-primary">Submit changes</button>
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