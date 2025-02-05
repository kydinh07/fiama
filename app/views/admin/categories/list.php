			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
			    <div class="content">
			        <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
			            <h1>Categories</h1>
			            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
			                <span><i class="mdi mdi-chevron-right"></i></span>Categories
			            </p>
			        </div>
			        <div class="row">
			            <div class="col-xl-4 col-lg-12">
			                <div class="ec-cat-list card card-default mb-24px">
			                    <div class="card-body">
			                        <div class="ec-cat-form">
			                            <h4>Add Category</h4>

			                            <form>

			                                <div class="form-group row">
			                                    <label for="text" class="col-12 col-form-label">Name</label>
			                                    <div class="col-12">
			                                        <input id="text" name="text" class="form-control here slug-title" type="text">
			                                    </div>
			                                </div>

			                                <div class="form-group row">
			                                    <label class="col-12 col-form-label">Description</label>
			                                    <div class="col-12">
			                                        <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control"></textarea>
			                                    </div>
			                                </div>

			                                <div class="form-group row">
			                                    <label for="parent-category" class="col-12 col-form-label">Parent Category</label>
			                                    <div class="col-12">
			                                        <select id="parent-category" name="parent-category" class="custom-select">
			                                            <option value="">Clothes</option>
			                                            <option value="uncategorized">Footwear</option>
			                                            <option value="new category">Jewellry</option>
			                                            <option value="new category">Perfume</option>
			                                            <option value="new category">Cosmatics</option>
			                                            <option value="new category">Glasses</option>
			                                            <option value="new category">Bags</option>
			                                        </select>
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="parent-category" class="col-12 col-form-label">Location</label>
			                                    <div class="col-12">
			                                        <select id="parent-category" name="parent-category" class="custom-select">
			                                            <option value="">Clothes</option>
			                                            <option value="uncategorized">Footwear</option>
			                                            <option value="new category">Jewellry</option>
			                                            <option value="new category">Perfume</option>
			                                            <option value="new category">Cosmatics</option>
			                                            <option value="new category">Glasses</option>
			                                            <option value="new category">Bags</option>
			                                        </select>
			                                    </div>
			                                </div>

			                                <div class="row">
			                                    <div class="col-12">
			                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
			                                    </div>
			                                </div>

			                            </form>

			                        </div>
			                    </div>
			                </div>
			            </div>
			            <div class="col-xl-8 col-lg-12">
			                <div class="ec-cat-list card card-default">
			                    <div class="card-body">
			                        <div class="table-responsive">
			                            <table id="responsive-data-table" class="table">
			                                <thead>
			                                    <tr>
			                                        <th>Imgage</th>
			                                        <th>Name</th>
			                                        <th>Parent Category</th>
			                                        <!-- <th>Description</th> -->
			                                        <th>Location</th>
			                                        <th>Status</th>
			                                        <!-- <th>Trending</th> -->
			                                        <th>Action</th>
			                                    </tr>
			                                </thead>

			                                <tbody>

			                                    <?php
                                                foreach ($listCategory as $lc) {
                                                ?>
			                                        <tr>
			                                            <td><img class="cat-thumb" src="assets/img/category/clothes.png" alt="product image" /></td>
			                                            <td><?php echo $lc['Name'] ?></td>
			                                            <td>
			                                                <span class="ec-sub-cat-list">
			                                                    <span class="ec-sub-cat-tag">pr id: <?php echo $lc['ParentId']?></span>
			                                                </span>
			                                            </td>

			                                            <td><?php echo $lc['Location']?></td>
			                                            <td>ACTIVE</td>

			                                            <td>
			                                                <div class="btn-group">
			                                                    <button type="button" class="btn btn-outline-success">Info</button>
			                                                    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
			                                                        <span class="sr-only">Info</span>
			                                                    </button>

			                                                    <div class="dropdown-menu">
			                                                        <a class="dropdown-item" href="#">Edit</a>
			                                                        <a class="dropdown-item" href="#">Delete</a>
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
			    </div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->