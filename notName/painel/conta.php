<?php 
include 'header.php';
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				
				<h3 class="box-title">Usuarios</h3>
				<form action="#" method="POST" enctype="multipart/form-data"
				id="formProduto">
				<div class="row p-t-20">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Nome do usuario</label> <input
							type="text" id="txtNomeUsr" class="form-control"
							placeholder="Usuario"
							name="txtNomeUsr"> <small
							class="form-control-feedback text-danger"> Insira um nome de usuario</small>
					</div>
				</div>
				<!--/span-->
				<div class="col-md-4">
					<div class="form-group has-danger">
						<label class="control-label">Senha</label>
						<input type="password" id="txtSenhaUsr" class="form-control"
							placeholder="Senha"
							name="txtSenhaUsr">
						<small class="form-control-feedback text-danger">Insira uma senha com 6 caracteres no minimo</small>
					</div>
				</div>
				<!--/span-->
				<div class="col-md-2">
					<div class="form-group">

						<label class="control-label mb-3 ">Status</label>

						<div class="form-group">
							<div class="col-sm-7 col-md-7">
								<div class="input-group">
									<div id="radioBtnUsr" class="btn-group">
										<a class="btn btn-primary btn-sm active"
										data-toggle="statusUsuario" data-title="Ativo">Ativo</a>
										<a class="btn btn-secondary btn-sm notActive"
										data-toggle="statusUsuario" data-title="Inativo">Inativo</a>
									</div>
									<input type="hidden" name="statusUsuario"
									id="statusUsuario" value="Ativo">
								</div>
							</div>
						</div>
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

	<div class="table-responsive m-t-40">
		<h6 class="card-subtitle">Categorias Cadastradas</h6>

		<table id="tableCategoria"
		class="display nowrap table table-hover table-striped table-bordered text-center"
		cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Usuarios</th>
				<th class="text-center">Status</th>
		

			</tr>
		</thead>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				
			</tr>
		<tbody>


		</tbody>
	</table>
</div>

</div>
</div>



</div>
<!-- End PAge Content -->
</div>


<?php include_once 'footer.php';?>