<?php
include_once 'header.php';

require_once '../dal/MarcaDAL.php';
require_once '../dal/CategoriaDAL.php';
require_once '../dal/ProdutoDAL.php';

$marcas = MarcaDAL::buscaMarca();
$categorias = CategoriaDAL::buscaCategoria();
$produtos = ProdutoDAL::buscaProduto();

?>



<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs profile-tab" role="tablist">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab"
						href="#produtos" role="tab">Produtos</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab"
							href="#categoria" role="tab">Categoria</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab"
								href="#marca" role="tab">Marca</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="produtos" role="tabpanel">
									<div class="card-body">
										<div class="form-body">
											<h3 class="box-title m-t-40">Produtos</h3>
											<form action="#" method="POST" enctype="multipart/form-data"
											id="formProduto">
											<div class="row p-t-20">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Descrição do Produto</label> <input
														type="text" id="firstName" class="form-control"
														placeholder="Calça destacadora de perseguida"
														name="txtNomeProduto"> <small
														class="form-control-feedback text-danger"> This is inline
													help </small>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group has-danger">
													<label class="control-label">Descrição Completa</label>
													<textarea class="form-control form-control-danger"
													name="txtDescricaoProduto"> </textarea>
													<small class="form-control-feedback text-danger"> This field
													has error. </small>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Marca</label> <select
													class="form-control " data-placeholder="Choose a Category"
													tabindex="1" name="marcaProduto">
													<option value="">Selecione...</option>
													<?php
													foreach ($marcas as $marcaCmb) {
														if ($marcaCmb->getStatusMarca() == "Ativo") {
															echo "<option value = '{$marcaCmb->getIdMarca()}'>{$marcaCmb->getDescMarca()}</option>";
														}
													}

													?>
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
																<a class="btn btn-primary btn-sm active"
																data-toggle="statusProduto" data-title="Ativo">Ativo</a>
																<a class="btn btn-secondary btn-sm notActive"
																data-toggle="statusProduto" data-title="Inativo">Inativo</a>
															</div>
															<input type="hidden" name="statusProduto"
															id="statusProduto">
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<!-- CATEGORIA -->
									<div class="content">
										<h3 class="box-title m-t-40 text-center">Categorias</h3>
										<div class="text-center">
											<div class="col-md-12 mb-3">

												<?php

												foreach ($categorias as $categoria) {

													if ($categoria->getStatusCateg() == "Ativo") {

														echo "
														<span class='button-checkbox mb-2 mx-1'>
														<button type='button' class='btn mb-3' data-color='secondary'>{$categoria->getDescCateg()}</button>
														<input type='checkbox' class='hidden' name='categoriaIdProduto[]' id = '{$categoria->getIdCateg()}' value = '{$categoria->getIdCateg()}' />
														</span>

														";
													}
												}

												?>

											</div>
										</div>
									</div>
									<div class="content">
										<h3 class="box-title m-t-40 text-center">Foto do Produto</h3>
										<div class="col-md-6 offset-md-3">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-btn"> <span
														class="btn btn-primary btn-file"> Procurar... <input
														type="file" id="imgInp" name="fotoProduto">
													</span>
												</span> <input type="text" class="form-control" readonly>
											</div>
											<img id='img-upload' />
										</div>
									</div>
								</div>
							</form>

							<div class="form-actions text-center">
								<button type="button" class="btn btn-success"
								id="btnCadastroProduto">
								<i class="fa fa-check"></i> Cadastrar
							</button>
							<button type="button" class="btn btn-inverse">
								<i class="fa fa-check"></i> CANCEL
							</button>
						</div>
					</div>

					<div class="card mt-5 border">
						<span class="badge badge-secondary mb-4"><h3
							class="box-title text-center text-light">Produtos Cadastrados</h3></span>

							<div class="content  mb-4 mt-1">
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">
										<li class="page-item disabled"><a class="page-link" href="#"
											tabindex="-1">Previous</a></li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#">Next</a>
											</li>
										</ul>
									</nav>
									<div class="form-group mt-4">
										<select name="" id=""
										class="form-control  col-md-4 offset-md-4">
										<option value="">Selecione...</option>
									</select>
								</div>
							</div>
							<!-- Pagination -->

							<div class="row">

								<?php

								foreach ($produtos as $prod) {

									echo "

									<div class='col-lg-3 col-md-6 m-b-20' id = '{$prod->getIdProd()}' onclick = \"alert(this.id)\">
									<img src='../img/Produto{$prod->getIdProd()}' class='img-responsive radius' />
									<div class='like-comm'>
									{$prod->getDescProd()}
									</div>
									</div>

									";
								}
								?>


							</div>
						</div>




					</div>
				</div>
				<!--second tab-->
				<div class="tab-pane" id="categoria" role="tabpanel">
					<div class="card-body">
						<div class="form-body">

							<h3 class="box-title m-t-40">Categoria</h3>
							<form action="#" method="POST" id="formCategoria">
								<div class="row">
									<div class="col-md-6 ">
										<div class="form-group">
											<label>Categoria</label> <input type="text"
											class="form-control" id="txtCategoria" name="txtCategoria">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">

											<label class="control-label mb-4">Status</label>

											<div class="form-group">
												<div class="col-sm-7 col-md-7">
													<div class="input-group">
														<div id="radioBtn" class="btn-group">
															<a class="btn btn-primary btn-sm active"
															data-toggle="statusCategoria" data-title="Ativo">Ativo</a>
															<a class="btn btn-secondary btn-sm notActive"
															data-toggle="statusCategoria" data-title="Inativo">Inativo</a>
														</div>
														<input type="hidden" name="statusCategoria"
														id="statusCategoria">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>

							<div class="form-actions">
								<button type="submit" class="btn btn-success"
								id="btnCadastroCategoria">
								<i class="fa fa-check"></i> Save
							</button>
							<button type="button" class="btn btn-inverse">Cancel</button>
						</div>


						<div class="table-responsive m-t-40">
							<h6 class="card-subtitle">Categorias Cadastradas</h6>

							<table id="tableCategoria"
							class="display nowrap table table-hover table-striped table-bordered"
							cellspacing="0" width="100%">
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

								foreach ($categorias as $categoriaTabela) {
									echo "
									<tr>

									<td>" . $categoriaTabela->getIdCateg() . "</td>
									<td>" . $categoriaTabela->getDescCateg() . "</td>
									<td>" . $categoriaTabela->getStatusCateg() . "</td>
									<td class='text-center'><button class='btn btn-inverse' id = '" . $categoriaTabela->getIdCateg() . "'>Alterar</button></td>
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
									<label>Marca</label> <input type="text" class="form-control"
									name="txtMarca">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">

									<label class="control-label mb-4">Status</label>

									<div class="form-group">
										<div class="col-sm-7 col-md-7">
											<div class="input-group">
												<div id="radioBtn" class="btn-group">
													<a class="btn btn-primary btn-sm active"
													data-toggle="statusMarca" data-title="Ativo">Ativo</a>
													<a class="btn btn-secondary btn-sm notActive"
													data-toggle="statusMarca" data-title="Inativo">Inativo</a>
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
						<button type="submit" class="btn btn-success"
						name="btnCadastroMarca" id="btnCadastroMarca">
						<i class="fa fa-check"></i> Save
					</button>
					<button type="button" class="btn btn-inverse">Cancel</button>
				</div>

				<div class="table-responsive m-t-40">
					<h6 class="card-subtitle">Marcas Cadastradas</h6>

					<table id="tableMarca"
					class="display nowrap table table-hover table-striped table-bordered"
					cellspacing="0" width="100%">
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

							<td>" . $marca->getIdMarca() . "</td>
							<td>" . $marca->getDescMarca() . "</td>
							<td>" . $marca->getStatusMarca() . "</td>
							<td class='text-center'><button class='btn btn-inverse' id = '" . $marca->getIdMarca() . "'>Alterar</button></td>
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
						<a href="javascript:void(0)" class="link m-r-10"> <i
							class="fa fa-heart text-danger"> </i> 5 Love
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 m-b-20">
					<img src="images/big/img2.jpg" class="img-responsive radius" />
					<div class="like-comm">
						<a href="javascript:void(0)" class="link m-r-10"> <i
							class="fa fa-heart text-danger"> </i> 5 Love
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 m-b-20">
					<img src="images/big/img3.jpg" class="img-responsive radius" />
					<div class="like-comm">
						<a href="javascript:void(0)" class="link m-r-10"> <i
							class="fa fa-heart text-danger"> </i> 5 Love
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 m-b-20">
					<img src="images/big/img4.jpg" class="img-responsive radius" />
					<div class="like-comm">
						<a href="javascript:void(0)" class="link m-r-10"> <i
							class="fa fa-heart text-danger"> </i> 5 Love
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



<?php include_once 'footer.php';?>
<script src="js/cadastroProduto.js"></script>





