<?php
include_once 'header.php';




require_once '../dal/MarcaDAL.php';
require_once '../dal/CategoriaDAL.php';

$marcas = MarcaDAL::buscaMarca();
$categorias = CategoriaDAL::buscaCategoria();

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
								<form action="#">
									<div class="row p-t-20">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Descrição do Produto</label>
												<input type="text" id="firstName" class="form-control" placeholder="Calça destacadora de perseguida">
												<small class="form-control-feedback text-danger"> This is inline help </small> </div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group has-danger">
													<label class="control-label">Descrição Completa</label>
													<textarea class="form-control form-control-danger"> </textarea>
													<small class="form-control-feedback text-danger"> This field has error. </small> </div>
												</div>
												<!--/span-->
											</div>

											<div class="row">

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Marca</label>
														<select class="form-control " data-placeholder="Choose a Category" tabindex="1">
															<option value="">Selecione...</option>
															<option value="">Category 2</option>
															<option value="">Category 5</option>
															<option value="">Category 4</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">

														<label class="control-label mb-3">Status</label>

														<div class="form-group">
															<div class="col-sm-7 col-md-7">
																<div class="input-group">
																	<div id="radioBtn" class="btn-group">
																		<a class="btn btn-primary btn-sm active" data-toggle="statusProduto" data-title="A">Ativo</a>
																		<a class="btn btn-secondary btn-sm notActive" data-toggle="statusProduto" data-title="I">Inativo</a>
																	</div>
																	<input type="" name="statusProduto" id="statusProduto">
																</div>
															</div>
														</div>
													</div>
												</div>

											</div>
											<!-- CATEGORIA -->
											<div class="content">
												<h3 class="box-title m-t-40 text-center">Categorias</h3>
												<hr>
												<div class="text-center">
													<div class="col-md-12 mb-3">

														<?php 

														foreach ($categorias as $categoria) {

															// if($marca->getStatusMarca == "Ativo"){

															echo "
															<span class='button-checkbox'>
															<button type='button' class='btn' data-color='secondary'>{$categoria->getDescCateg()}</button>
															<input type='checkbox' class='hidden' name='categoriProtudo' id = '{$categoria->getIdCateg()}' />
															</span>

															";
														}

														// }

														?>

														





													</div>
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
												<i class="fa fa-check"></i> Cadastrar
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
										<form action="#">
											<div class="row">
												<div class="col-md-6 ">
													<div class="form-group">
														<label>Categoria</label>
														<input type="text" class="form-control">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">

														<label class="control-label mb-4">Status</label>

														<div class="form-group">
															<div class="col-sm-7 col-md-7">
																<div class="input-group">
																	<div id="radioBtn" class="btn-group">
																		<a class="btn btn-primary btn-sm active" data-toggle="statusCategoria" data-title="Ativo">Ativo</a>
																		<a class="btn btn-secondary btn-sm notActive" data-toggle="statusCategoria" data-title="Inativo">Inativo</a>
																	</div>
																	<input type="hidden" name="statusCategoria" id="statusCategoria">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>

										<div class="form-actions">
											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
											<button type="button" class="btn btn-inverse">Cancel</button>
										</div>


										<div class="table-responsive m-t-40">
											<h6 class="card-subtitle">Categorias Cadastradas</h6>

											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>ID</th>
														<th>Categoria</th>
														<th>Status</th>
														<th class="text-center">Ações</th>

													</tr>
												</thead>

												<tbody>

													<?php

													foreach ($marcas as $marca) {
														echo "
														<tr>

														<td>".$marca->getIdMarca()."</td>
														<td>".$marca->getDescMarca()."</td>
														<td>".$marca->getStatusMarca()."</td>
														<td class='text-center'><button class='btn btn-inverse' id = '".$marca->getIdMarca()."'>Alterar</button></td>
														</tr>
														";
													}

													

													?>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
							<div class="tab-pane" id="marca" role="tabpanel">
								<div class="card-body">
									<div class="form-body">
										<h3 class="box-title m-t-40">Marca</h3>
										<form action="#" method="POST" id="formMarca">

											<div class="row">
												<div class="col-md-6 ">
													<div class="form-group">
														<label>Marca</label>
														<input type="text" class="form-control" name="txtMarca">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">

														<label class="control-label mb-4">Status</label>

														<div class="form-group">
															<div class="col-sm-7 col-md-7">
																<div class="input-group">
																	<div id="radioBtn" class="btn-group">
																		<a class="btn btn-primary btn-sm active" data-toggle="statusMarca" data-title="Ativo">Ativo</a>
																		<a class="btn btn-secondary btn-sm notActive" data-toggle="statusMarca" data-title="Inativo">Inativo</a>
																	</div>
																	<input type="hidden" name="statusMarca" id="statusMarca">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
										</form>

										<div class="form-actions">
											<button type="submit" class="btn btn-success" name="btnCadastroMarca" id="btnCadastroMarca"> <i class="fa fa-check"></i> Save</button>
											<button type="button" class="btn btn-inverse">Cancel</button>
										</div>

										<div class="table-responsive m-t-40">
											<h6 class="card-subtitle">Marcas Cadastradas</h6>

											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>ID</th>
														<th>Marca</th>
														<th>Status</th>
														<th class="text-center">Ações</th>

													</tr>
												</thead>

												<tbody>

													<?php

													foreach ($marcas as $marca) {
														echo "
														<tr>

														<td>".$marca->getIdMarca()."</td>
														<td>".$marca->getDescMarca()."</td>
														<td>".$marca->getStatusMarca()."</td>
														<td class='text-center'><button class='btn btn-inverse' id = '".$marca->getIdMarca()."'>Alterar</button></td>
														</tr>
														";
													}

													

													?>
												</tbody>
											</table>
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
			$("#btnCadastroMarca").click(function() {
				carregando();

				var form = $('#formMarca');

				$.ajax( {
					type: "POST",
					url: './controller/controllerProduto.php?action=insereCategoria',
					data: form.serialize(),
					success: function( response ) {
						alert( response );

						parar();
					}
				} );

				

			});
		</script>

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




		<script>
			$(function () {

				$("#statusProduto").val("Ativo");
				$("#statusCategoria").val("Ativo");

				$("#statusMarca").val("Ativo");


				

				$('.button-checkbox').each(function () {
					// Vê se é "Radio" ou Check
					var $widget = $(this),
					$button = $widget.find('button'),
					$checkbox = $widget.find('input:checkbox'),
					color = $button.data('color'),
					settings = {
						on: {
							icon: 'fa fa-check-square'
						},
						off: {
							icon: 'fa fa-square'
						}
					};

					$button.on('click', function () {
						$checkbox.prop('checked', !$checkbox.is(':checked'));
						$checkbox.triggerHandler('change');
						updateDisplay();
					});
					$checkbox.on('change', function () {
						updateDisplay();
					});



					function updateDisplay() {
						var isChecked = $checkbox.is(':checked');

						$button.data('state', (isChecked) ? "on" : "off");

						$button.find('.state-icon')
						.removeClass()
						.addClass('state-icon ' + settings[$button.data('state')].icon);

						if (isChecked) {
							$button
							.removeClass('btn-secondary')
							.addClass('btn-' + color + ' active');
						}
						else {
							$button
							.removeClass('btn-' + color + ' active')
							.addClass('btn-secondary');
						}
					}

					function init() {

						updateDisplay();

						if ($button.find('.state-icon').length == 0) {
							$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
						}
					}
					init();
				});


				$('#radioBtn a').on('click', function(){
					var sel = $(this).data('title');
					var tog = $(this).data('toggle');
					$('#'+tog).prop('value', sel);

					$('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
					$('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
				})

			});
		</script>