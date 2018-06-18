<?php
include_once 'header.php';

require_once '../dal/CategoriaDAL.php';
$categorias = CategoriaDAL::buscaCategoria();

$categoriasFilhas = CategoriaDAL::buscaCategoriaFilha();

$id = $categorias[0]->getIdCateg();
?>



<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs profile-tab" role="tablist">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab"
						href="#pai" role="tab">Categoria Pai</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab"
							href="#filha" role="tab">Categoria Filha</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="pai" role="tabpanel">
								<div class="card-body">
									<div class="form-body">
										<h3 class="box-title m-t-40">Categoria Pai</h3>
										<form action="#" method="POST" id="formCategoria">
											<div class="row">
												<div class="col-md-6 ">
													<div class="form-group">
														<input type="hidden" name="idCategPai" id="idCategPai" value="<?php echo $id;?>">
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
																	id="statusCategoria" value="Ativo">
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
											<i class="fa fa-check"></i> Cadastrar
										</button>
										<button type="button" class="btn btn-inverse">Cancelar</button>
									</div>


									<div class="table-responsive m-t-40">
										<h6 class="card-subtitle">Categorias Cadastradas</h6>

										<table id="tableCategoria"
										class="display nowrap table table-hover table-striped table-bordered text-center"
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
												if ($categoriaTabela->getCodPai() == NULL) {
													echo "
													<tr id='rowCatPai".$categoriaTabela->getIdCateg()."'>

													<td>" . $categoriaTabela->getIdCateg() . "</td>
													<td>" . $categoriaTabela->getDescCateg() . "</td>
													<td><span class = 'badge badge-success'>" . $categoriaTabela->getStatusCateg() . "</span></td>
													<td class='text-center'><button class='btn btn-inverse' id = '" . $categoriaTabela->getIdCateg() . "' onclick='alteraCategoriaPai(this.id)'>Alterar</button></td>
													</tr>
													";
												}
											}

											?>
										</tbody>
									</table>
								</div>

							</div>



						</div>
					</div>

					<div class="tab-pane" id="filha" role="tabpanel">
						<div class="card-body">
							<div class="form-body">
								<h3 class="box-title m-t-40">Categoria Filha</h3>
								<form action="#" method="POST" id="formCategoriaFilha">

									<div class="row">
										<div class="col-md-6 ">
											<div class="form-group">
												<input type="hidden" name="idCategFilha" id="idCategFilha" value="<?php echo $id;?>">
												<label>Nome</label> <input type="text" class="form-control"
												name="txtCategoriaFilho" id="txtCategoriaFilho">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Categoria</label> <select
												class="form-control " data-placeholder="Choose a Category"
												tabindex="1" name="optCategoriaPai" id="optCategoriaPai">
												<option value="">Selecione...</option>
												<?php

												foreach ($categorias as $cat) {
													if ($cat->getStatusCateg() == "Ativo" && $cat->getCodPai() == NULL) {
														echo "<option value = '{$cat->getIdCateg()}'>{$cat->getDescCateg()}</option>";
													}
												}

												?>
											</select>

										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">

											<label class="control-label mb-4">Status</label>

											<div class="form-group">
												<div class="col-md-3 col-md-3">
													<div class="input-group">
														<div id="radioBtn" class="btn-group">
															<a class="btn btn-primary btn-sm active"
															data-toggle="statusMarca" data-title="Ativo">Ativo</a>
															<a class="btn btn-secondary btn-sm notActive"
															data-toggle="statusMarca" data-title="Inativo">Inativo</a>
														</div>
														<input type="hidden" name="statusCategoriaFilha"
														id="statusCategoriaFilha" value="Ativo">
													</div>
												</div>
											</div>


										</div>
									</div>


								</div>

							</form>

							<div class="form-actions">
								<button type="submit" class="btn btn-success"
								name="btnCadastroCategoriaFilha"
								id="btnCadastroCategoriaFilha">
								<i class="fa fa-check"></i> Cadastrar
							</button>
							<button type="button" class="btn btn-inverse">Cancelar</button>
						</div>

						<div class="table-responsive m-t-40">
							<h6 class="card-subtitle">Marcas Cadastradas</h6>

							<table id="tableMarca"
							class="display nowrap table table-hover table-striped table-bordered"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Categoria</th>
									<th class='text-center'>Status</th>
									<th>Categoria Pai</th>

									<th class="text-center">Ações</th>

								</tr>
							</thead>

							<tbody>
								<?php

								foreach ($categoriasFilhas as $categFilhaTabela) {
									echo "
									<tr id='rowCatFilho".$categFilhaTabela->getIdCateg()."'>

									<td>" . $categFilhaTabela->getIdCateg() . "</td>
									<td>" . $categFilhaTabela->getDescCateg() . "</td>
									<td class='text-center'><span class = 'badge badge-success'>" . $categFilhaTabela->getStatusCateg() . "</span></td>
									<td hidden>". $categFilhaTabela->getCodPai() ."</td>
									<td >" . $categFilhaTabela->getDescPai() . "</td>

									<td class='text-center'><button class='btn btn-inverse' id = '" . $categFilhaTabela->getIdCateg() . "' onclick='alteraCategoriaFilha(this.id)'>Alterar</button></td>
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

</div>
<!-- End PAge Content -->
</div>



<?php include_once 'footer.php';?>
<script src="js/alteraCategoria.js"></script>
<script src="js/ajaxCategoria.js"></script>










