<?php
include_once 'header.php';

require_once '../dal/MarcaDAL.php';

$marcas = MarcaDAL::buscaMarca();

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				
				<div class="form-body">
					<h3 class="box-title">Marca</h3>
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
												<input type="hidden" name="statusMarca" id="statusMarca" value="Ativo">
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
<!-- End PAge Content -->
</div>



<?php include_once 'footer.php';?>
<script src="js/cadastroProduto.js"></script>





