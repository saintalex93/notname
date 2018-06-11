<?php 
include 'header.php';
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				
				<h3 class="box-title">Usuarios</h3>
				<form action="#" method="POST" enctype="multipart/form-data"
				id="formUsrSys">
				<div class="row p-t-20">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Nome do usuario</label> <input
							type="text" name="txtNomeUsr" id="txtNomeUsr" class="form-control"
							placeholder="Nome"
							name="txtNomeUsr"> <small
							class="form-control-feedback text-danger"> Insira um nome de usuario</small>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group has-danger">
							<label class="control-label">Email</label>
							<input type="email" name="txtEmail" id="txtEmail" class="form-control"
							placeholder="Email"
							name="txtEmail">
							<small class="form-control-feedback text-danger">Insira o email do usuario do sistema</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group has-danger">
							<label class="control-label">Login</label>
							<input type="text" name="txtLogin" id="txtLogin" class="form-control"
							placeholder="Login"
							name="txtLogin">
							<small class="form-control-feedback text-danger">Insira seu usuario de acesso ao sistema</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group has-danger">
							<label class="control-label">Senha</label>
							<input type="password" name="txtSenhaUsr" id="txtSenhaUsr" class="form-control"
							placeholder="Senha"
							name="txtSenhaUsr">
							<small class="form-control-feedback text-danger">Insira uma senha com 6 caracteres no minimo</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group has-danger">
							<label class="control-label">Senha</label>
							<select name="permissao" name="permissao" id="permissao" class="form-control">
								<option value="0">Selecione uma permissao</option>
								<option value="1">Administrador</option>
							</select>
							<small class="form-control-feedback text-danger">Selecione a permissao do usuario</small>
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
				id="btnCadastroUsr">
				<i class="fa fa-check"></i> Cadastrar
			</button>
			<button type="button" class="btn btn-inverse">
				<i class="fa fa-check"></i> CANCEL
			</button>

		</div>
			<div>
				<p class="text-center" id="returnCadastroUsr"></p>
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
<script src="./js/CadastraUsrSys.js"></script>