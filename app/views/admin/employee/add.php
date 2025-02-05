			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Add Staff</h1>
							<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Add Staff
							</p>
						</div>

					</div>
					<div class="card bg-white profile-content">
						<div class="row">

							<div class="col-lg-12 col-xl-12">
								<div class="profile-content-right profile-right-spacing py-5">
									<div class="tab-content px-3 px-xl-5" id="myTabContent">
										<!-- Tab Pane -->
										<!-- Enter New Employee -->
										<div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="settings-tab">
											<div class="tab-pane-content mt-5">
												<form method="post" enctype="multipart/form-data" action="<?=_WEB_ROOT . "/Admin/SaveEmployee"?>">
													<div class="form-group row mb-6">
														<label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
														<div class="col-sm-8 col-lg-10">
															<div class="custom-file mb-1">
																<input type="file" name="coverImage" class="custom-file-input" id="coverImage">
																<label class="custom-file-label" for="coverImage">Choose
																	file...</label>
																<div class="invalid-feedback">Example invalid custom
																	file feedback</div>
															</div>
														</div>
													</div>

													<div class="row mb-2">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="firstName">First name</label>
																<input type="text" class="form-control" id="firstName" name="FirstName" placeholder="First name">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group">
																<label for="lastName">Last name</label>
																<input type="text" class="form-control" id="lastName" name="LastName" placeholder="Last name">
															</div>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="userName">UserName</label>
																<input type="text" class="form-control" id="userName" name="UserName" placeholder="Username">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group">
																<label for="Email">Email</label>
																<input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
															</div>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="password">Password</label>
																<input type="text" class="form-control" id="password" name="Password" placeholder="Password">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group">
																<label for="cofirmPassword">Cofirm Password</label>
																<input type="text" class="form-control" id="cofirmPassword" name="ConfirmPassword" placeholder="Cofirm Password">
															</div>
														</div>
													</div>

													<div class="row mb-2">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="phone">Phone</label>
																<input type="text" class="form-control" id="phone" name="Phone" placeholder="Phone">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group">
																<label for="Position">Position</label>

																<div>
																<select class="form-select" name="Position" id="select-position">
																	<option value="0">Choose Position</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																</select>
																</div>
															</div>
														</div>
													</div>
													
													<!-- <div class="row mb-2">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="Province">Province</label>
																<div>
																<select class="form-select" name="" id="select-position">
																	<option value="">Choose Province</option>
																	<option value="">Choose Province</option>
																	<option value="">Choose Province</option>
																	<option value="">Choose Province</option>
																	<option value="">Choose Province</option>
																</select>
																</div>
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group">
																<label for="district">District</label>
																<div>
																<select class="form-select" name="" id="select-position">
																	<option value="">Choose District</option>
																	<option value="">Choose District</option>
																	<option value="">Choose District</option>
																	<option value="">Choose District</option>
																	<option value="">Choose District</option>
																</select>
																</div>
															</div>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="wards">Wards</label>
																<div>
																<select class="form-select" name="" id="select-position">
																	<option value="">Choose Wards</option>
																	<option value="">Choose Wards</option>
																	<option value="">Choose Wards</option>
																	<option value="">Choose Wards</option>
																	<option value="">Choose Wards</option>
																</select>
																</div>
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group">
																<label for="district">Street</label>
																<input type="text" class="form-control" id="district" value="District">
															</div>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="faceBook">Facebook</label>
																<input type="text" class="form-control" id="faceBook" value="https://www.facebook.com/kydingg">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group">
																<label for="skype">Skype</label>
																<input type="text" class="form-control" id="skype" value="skype.xxx">
															</div>
														</div>
													</div> -->
													<div class="d-flex justify-content-end mt-5">
														<button type="submit" class="btn btn-primary mb-2 btn-pill">Add Staff</button>
													</div>
												</form>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->