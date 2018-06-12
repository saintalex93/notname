<?php
include_once 'header.php';

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<h4 class="card-title mb-5">Tamanho</h4>
				<form action="#" method="POST" id="formCategoria">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label>Descrição</label>
								 <input type="text"	class="form-control" id="txtCategoria" name="txtCategoria">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Tamanho</label> 
								 <input type="text"	class="form-control" id="txtCategoria" name="txtCategoria">
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


				</tbody>
			</table>
		</div>


	</div>
</div>
</div>

</div>
<!-- End PAge Content -->



<?php include_once 'footer.php';?>
<script src="js/cadastroProduto.js"></script>








