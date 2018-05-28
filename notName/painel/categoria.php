<?php
include_once 'header.php';

require_once '../dal/CategoriaDAL.php';

$categorias = CategoriaDAL::buscaCategoria();

?>



<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">

				

					<h3 class="box-title">Categoria</h3>
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
							<td> <span class = 'badge badge-primary'>" . $categoriaTabela->getStatusCateg() . "</span></td>
							<td class='text-center'><button class='btn btn-inverse' id = '" . $categoriaTabela->getIdCateg() . "'>Alterar</button></td>
							</tr>
							";
						}

						?>
					</tbody>
				</table>
			</div>


	</div>
	<!-- Column -->


</div>
<!-- End PAge Content -->
</div>
</div>



<?php include_once 'footer.php';?>
<script src="js/cadastroProduto.js"></script>





