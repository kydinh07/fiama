			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
			    <div class="content">
			        <div class="breadcrumb-wrapper breadcrumb-contacts">
			            <div>
			                <h1>Employee</h1>
			                <p class="breadcrumbs"><span><a href="index.html">Admin</a></span>
			                    <span><i class="mdi mdi-chevron-right"></i></span>Employee
			                </p>
			            </div>
			            <div>
			                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
								Add User
							</button> -->
							<button type="button" class="btn btn-primary">
								<a href="<?php echo _WEB_ROOT.'/admin/employee?action=add'?>" style="text-decoration: none; color: #fff;">Add Employee</a>
							</button>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-12">
			                <div class="ec-vendor-list card card-default">
			                    <div class="card-body">
			                        <div class="table-responsive">
			                            <table id="responsive-data-table" class="table">
			                                <thead>
			                                    <tr>
			                                        <th>Img</th>
			                                        <th>Full Name</th>
			                                        <th>Email</th>
			                                        <th>Phone</th>
			                                        <th>UserName</th>
			                                        <th>Status</th>
			                                        <th>JoinOn</th>
			                                        <th>Action</th>
			                                    </tr>
			                                </thead>

			                                <tbody>
			                                    <?php
                                                    foreach($listEmployee as $le){
                                                ?>
			                                    <tr>
			                                        <td><img class="vendor-thumb" src="<?php echo _WEB_ROOT?>/public/assets/admin/img/vendor/u1.jpg" alt="user profile" /></td>
			                                        <td><?php echo $le['LastName'].' '.$le['FirstName'] ?></td>
			                                        <td><?php echo $le['Email'] ?></td>
			                                        <td><?php echo $le['Phone'] ?></td>
			                                        <td><?php echo $le['UserName'] ?></td>
			                                        <td><?php echo ($le['Status'] == 0) ? "Inactive" : " Active"; ?></td>
			                                        <td><?php echo $le['CreatedDate'] ?></td>
			                                        <td>
			                                            <div class="btn-group mb-1">
			                                                <button type="button" class="btn btn-outline-success">
																<a href="<?php echo _WEB_ROOT.'/admin/employee?action=profile&id='.$le['Id']?>" style="text-decoration: none; color: #34c997;">Info</a>
															</button>
			                                                <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
			                                                    <span class="sr-only">Info</span>
			                                                </button>

			                                                <div class="dropdown-menu">
															    <a class="dropdown-item" href="<?php echo _WEB_ROOT.'/admin/employee?action=profile&id='.$le['Id']?>">Profile</a>
			                                                    <a class="dropdown-item" href="<?php echo _WEB_ROOT.'/admin/employee?action=profile&id='.$le['Id'] ?>">Edit</a>
			                                                    <a class="dropdown-item" href="<?=_WEB_ROOT . "/Admin/DeleteEmployee?id=".$le['Id'] ?>">Delete</a>
			                                                </div>
			                                            </div>
			                                        </td>
			                                    </tr>
			                                    <?php
                                                    }
                                                ?>

			                                </tbody>
			                            </table>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <!-- Add User Modal  -->
			        <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			                <div class="modal-content">
			                    <form>
			                        <div class="modal-header px-4">
			                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
			                        </div>

			                        <div class="modal-body px-4">
			                            <div class="form-group row mb-6">
			                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User
			                                    Image</label>

			                                <div class="col-sm-8 col-lg-10">
			                                    <div class="custom-file mb-1">
			                                        <input type="file" class="custom-file-input" id="coverImage" required>
			                                        <label class="custom-file-label" for="coverImage">Choose
			                                            file...</label>
			                                        <div class="invalid-feedback">Example invalid custom file feedback
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="row mb-2">
			                                <div class="col-lg-6">
			                                    <div class="form-group">
			                                        <label for="firstName">First name</label>
			                                        <input type="text" class="form-control" id="firstName" value="John">
			                                    </div>
			                                </div>

			                                <div class="col-lg-6">
			                                    <div class="form-group">
			                                        <label for="lastName">Last name</label>
			                                        <input type="text" class="form-control" id="lastName" value="Deo">
			                                    </div>
			                                </div>

			                                <div class="col-lg-6">
			                                    <div class="form-group mb-4">
			                                        <label for="userName">User name</label>
			                                        <input type="text" class="form-control" id="userName" value="johndoe">
			                                    </div>
			                                </div>

			                                <div class="col-lg-6">
			                                    <div class="form-group mb-4">
			                                        <label for="email">Email</label>
			                                        <input type="email" class="form-control" id="email" value="johnexample@gmail.com">
			                                    </div>
			                                </div>

			                                <div class="col-lg-6">
			                                    <div class="form-group mb-4">
			                                        <label for="Birthday">Birthday</label>
			                                        <input type="text" class="form-control" id="Birthday" value="10-12-1991">
			                                    </div>
			                                </div>

			                                <div class="col-lg-6">
			                                    <div class="form-group mb-4">
			                                        <label for="event">Address</label>
			                                        <input type="text" class="form-control" id="event" value="Address here">
			                                    </div>
			                                </div>
			                            </div>
			                        </div>

			                        <div class="modal-footer px-4">
			                            <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
			                            <button type="button" class="btn btn-primary btn-pill">Save Contact</button>
			                        </div>
			                    </form>
			                </div>
			            </div>
			        </div>
			    </div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->