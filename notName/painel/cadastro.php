<?php
include_once 'header.php';
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs profile-tab" role="tablist">
					<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#produtos" role="tab">Produtos</a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#categoria" role="tab">Categoria</a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#marca" role="tab">Marca</a> </li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="produtos" role="tabpanel">
						<div class="card-body">
							<div class="form-body">
								<h3 class="box-title m-t-40">Produtos</h3>
								<hr>
								<form action="#">
									<div class="row p-t-20">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Descrição do Produto</label>
												<input type="text" id="firstName" class="form-control" placeholder="John doe">
												<small class="form-control-feedback"> This is inline help </small> </div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group has-danger">
													<label class="control-label">Descrição Completa</label>
													<textarea class="form-control form-control-danger"> </textarea>
													<small class="form-control-feedback"> This field has error. </small> </div>
												</div>
												<!--/span-->
											</div>

											<div class="row">

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Marca</label>
														<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
															<option value="Category 1">Category 1</option>
															<option value="Category 2">Category 2</option>
															<option value="Category 3">Category 5</option>
															<option value="Category 4">Category 4</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<label class="control-label">Marca</label>

													<div class="form-actions">

														<button type="button" class="btn btn-success"> 
															<i class="fa fa-check"></i> Save
														</button>
														<button type="button" class="btn btn-inverse">
															<i class="fa fa-check"></i> Cancel
														</button>
													</div>
												</div>

											</div>
											<!-- CATEGORIA -->
											<div class="content">
												<h3 class="box-title m-t-40 text-center">Categorias</h3>
												<hr>
												<div class="text-center">
													<button class="btn btn-primary">asdasd</button>
													<button class="btn btn-primary">asd</button>
													<button class="btn btn-primary">asd</button>
													<button class="btn btn-primary">asd</button>
													<button class="btn btn-primary">asd</button>
												</div>
											</div>

											<div class="content">
												<h3 class="box-title m-t-40 text-center">Foto do Produto</h3>
												<hr>
												<div class="col-md-6 offset-md-3">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-btn">
																<span class="btn btn-primary btn-file">
																	Browse… <input type="file" id="imgInp">
																</span>
															</span>
															<input type="text" class="form-control" readonly>
														</div>
														<img id='img-upload'/>
													</div>
												</div>
											</div>
										</form>

										<div class="form-actions text-center">
											<button type="button" class="btn btn-success"> 
												<i class="fa fa-check"></i> Save
											</button>
											<button type="button" class="btn btn-inverse">
												<i class="fa fa-check"></i> CANCEL
											</button>
										</div>
									</div>

									<div class="card mt-5 border">
										<span class="badge badge-secondary mb-4"><h3 class="box-title text-center text-light">Produtos Cadastrados</h3></span>

										<div class="content  mb-4 mt-1">
											<nav aria-label="Page navigation example">
												<ul class="pagination justify-content-center">
													<li class="page-item disabled">
														<a class="page-link" href="#" tabindex="-1">Previous</a>
													</li>
													<li class="page-item active"><a class="page-link" href="#">1</a></li>
													<li class="page-item"><a class="page-link" href="#">2</a></li>
													<li class="page-item"><a class="page-link" href="#">3</a></li>
													<li class="page-item">
														<a class="page-link" href="#">Next</a>
													</li>
												</ul>
											</nav>
											<div class="form-group mt-4">
											<select name="" id="" class="form-control  col-md-4 offset-md-4">
												<option value="">Selecione...</option>
											</select>
											</div>
										</div>
										<!-- Pagination -->

										<div class="row">

											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img1.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto
												</div>
											</div>
											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img2.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto 
												</div>
											</div>
											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img3.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto
												</div>
											</div>
											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img4.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto
												</div>
											</div>

											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img1.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto
												</div>
											</div>
											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img2.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto 
												</div>
											</div>
											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img3.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto
												</div>
											</div>
											<div class="col-lg-3 col-md-6 m-b-20">
												<img src="images/big/img4.jpg" class="img-responsive radius" />
												<div class="like-comm"> 
													Nome do Produto
												</div>
											</div>
										</div>
									</div>




								</div>
							</div>
							<!--second tab-->
							<div class="tab-pane" id="categoria" role="tabpanel">
								<div class="card-body">
									<div class="form-body">

										<h3 class="box-title m-t-40">Categoria</h3>
										<hr>
										<div class="row">
											<div class="col-md-12 ">
												<form action="#">
													<div class="form-group">
														<label>Street</label>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>City</label>
														<input type="text" class="form-control">
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label>State</label>
														<input type="text" class="form-control">
													</div>
												</div>
												<!--/span-->
											</div>
											<!--/row-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Post Code</label>
														<input type="text" class="form-control">
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label>Country</label>
														<select class="form-control custom-select">
															<option>--Select your Country--</option>
															<option>India</option>
															<option>Sri Lanka</option>
															<option>USA</option>
														</select>
													</div>
												</div>
											</div>
										</form>

										<div class="form-actions">
											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
											<button type="button" class="btn btn-inverse">Cancel</button>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="marca" role="tabpanel">
								<div class="card-body">
									<div class="form-body">
										<h3 class="box-title m-t-40">Address</h3>
										<hr>
										<div class="row">
											<div class="col-md-12 ">
												<form action="#">
													<div class="form-group">
														<label>Street</label>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>City</label>
														<input type="text" class="form-control">
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label>State</label>
														<input type="text" class="form-control">
													</div>
												</div>
												<!--/span-->
											</div>
											<!--/row-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Post Code</label>
														<input type="text" class="form-control">
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label>Country</label>
														<select class="form-control custom-select">
															<option>--Select your Country--</option>
															<option>India</option>
															<option>Sri Lanka</option>
															<option>USA</option>
														</select>
													</div>
												</div>
											</div>
										</form>

										<div class="form-actions">
											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
											<button type="button" class="btn btn-inverse">Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Column -->


				<div class="col-lg-12">
					<div class="card">
						<div class="content mb-4">
							<h2 class="card-title text-secondary">Produtos mais Vendidos!</h2>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3 col-md-6 m-b-20">
									<img src="images/big/img1.jpg" class="img-responsive radius" />
									<div class="like-comm"> 
										<a href="javascript:void(0)" class="link m-r-10">
											<i class="fa fa-heart text-danger">
											</i> 5 Love
										</a> 
									</div>
								</div>
								<div class="col-lg-3 col-md-6 m-b-20">
									<img src="images/big/img2.jpg" class="img-responsive radius" />
									<div class="like-comm"> 
										<a href="javascript:void(0)" class="link m-r-10">
											<i class="fa fa-heart text-danger">
											</i> 5 Love
										</a> 
									</div>
								</div>
								<div class="col-lg-3 col-md-6 m-b-20">
									<img src="images/big/img3.jpg" class="img-responsive radius" />
									<div class="like-comm"> 
										<a href="javascript:void(0)" class="link m-r-10">
											<i class="fa fa-heart text-danger">
											</i> 5 Love
										</a> 
									</div>
								</div>
								<div class="col-lg-3 col-md-6 m-b-20">
									<img src="images/big/img4.jpg" class="img-responsive radius" />
									<div class="like-comm"> 
										<a href="javascript:void(0)" class="link m-r-10">
											<i class="fa fa-heart text-danger">
											</i> 5 Love
										</a> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End PAge Content -->
		</div>



		<?php
		include_once 'footer.php';
		?>


		<script>
			$(document).ready( function() {
				$(document).on('change', '.btn-file :file', function() {
					var input = $(this),
					label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
					input.trigger('fileselect', [label]);
				});

				$('.btn-file :file').on('fileselect', function(event, label) {

					var input = $(this).parents('.input-group').find(':text'),
					log = label;

					if( input.length ) {
						input.val(log);
					} else {
						if( log ) alert(log);
					}

				});
				function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();

						reader.onload = function (e) {
							$('#img-upload').attr('src', e.target.result);
						}

						reader.readAsDataURL(input.files[0]);
					}
				}

				$("#imgInp").change(function(){
					readURL(this);
				}); 	
			});
		</script>