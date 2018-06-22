

<?php
include_once 'header.php';

require_once '../dal/CategoriaDAL.php';
require_once '../dal/ProdutoDAL.php';


$categorias = CategoriaDAL::buscaCategoria();
$categFilho = CategoriaDAL::categoriaFilho();
$produtos = ProdutoDAL::buscaProduto();

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				
				<h3 class="box-title">Produtos</h3>
				<form action="#" method="POST" enctype="multipart/form-data"
				id="formProduto">
				<div class="row p-t-20">
					<div class="col-md-5">
						<div class="form-group">
							<input type="hidden" name="idProd" value="">
							<label class="control-label">Descrição do Produto</label> <input
							type="text" id="txtNomeProduto" class="form-control"
							placeholder="Produto"
							name="txtNomeProduto"> 
							<!-- <small
							class="form-control-feedback text-danger"> This is inline
						help </small> -->
					</div>
				</div>
				
				<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Material</label> <input
							type="text" id="material" class="form-control"
							placeholder="Materiais"
							name="material"> 
					</div>
				</div>
				
				
				<div class="col-md-3">
					<div class="form-group">

						<label class="control-label mb-3">Status</label>

						<div class="form-group">
							<div class="col-sm-7 col-md-7">
								<div class="input-group">
									<div id="radioBtn" class="btn-group">
										<a class="btn btn-primary btn-sm active"
										data-toggle="statusProduto" data-title="ATIVO" id="btnProdActive">Ativo</a>
										<a class="btn btn-secondary btn-sm notActive"
										data-toggle="statusProduto" data-title="INATIVO" id="btnProdInactive">Inativo</a>
									</div>
									<input type="hidden" name="statusProduto"
									id="statusProduto" value="ATIVO">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--/span-->
				
				<!--/span-->
			</div>

			<div class="row">

				<div class="col-md-12">
					<div class="form-group has-danger">
						<label class="control-label">Descrição Completa</label>
						<textarea class="form-control" style = "height: 70px;"
						name="txtDescricaoProduto" id="txtDescricaoProduto"> </textarea>
						<!-- <small class="form-control-feedback text-danger"> This field
						has error. </small> -->
					</div>
				</div>


			</div>
			<!-- CATEGORIA -->
			<div class="content">
				<h3 class="box-title m-t-10 text-center">Categorias</h3>
				<div class="text-center">
					<div class="col-md-12 mb-3">

						<?php

					foreach ($categorias as $categoria) {

						if ($categoria->getStatusCateg() == "Ativo") {

							echo "
								<span class='button-checkbox mb-2 mx-1'>
								<button type='button' class='btn mb-3 categCheck' data-color='secondary' id='Bctg{$categoria->getIdCateg()}'>{$categoria->getDescCateg()}</button>
								<input type='checkbox' class='chkCat hidden' name='categoriaIdProduto[]' id = 'chkCats{$categoria->getIdCateg()}' value = '{$categoria->getIdCateg()}' />
								</span>

								";
						}
					}

					?>

					</div>
				</div>
			</div>
			<div class="content">
				<h3 class="box-title m-t-10 text-center">Categorias Filho</h3>
				<div class="text-center">
					<div class="col-md-12 mb-3">

						<?php

					foreach ($categFilho as $categoriaFilho) {

						if ($categoriaFilho->getStatusCateg() == "ATIVO") {

							echo "
								<span class='button-checkbox mb-2 mx-1'>
								<button type='button' class='btn mb-3 categCheck' data-color='secondary' id='Bctg{$categoriaFilho->getIdCateg()}'>{$categoriaFilho->getDescCateg()}</button>
								<input type='checkbox' class='chkCat hidden' name='categoriaIdProduto[]' id = 'chkCats{$categoriaFilho->getIdCateg()}' value = '{$categoriaFilho->getIdCateg()}' />
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
					<img id='img-upload' class='img-responsive radius mt-1' />
				</div>
			</div>
		</div>

		<input type="hidden" id="idProduct" name="idProduct">
	</form>

	<div class="form-actions text-center">
		<button type="button" class="btn btn-success"
		id="btnCadastroProduto" value="1">
		<i class="fa fa-check"></i> <span id="spanButton">CADASTRAR</span>
	</button>
	<button type="button" class="btn btn-inverse" id="btnCancelar">
		<i class="fa fa-check"></i> CANCELAR
	</button>
</div>

<div class="card mt-5 border">
	<span class="badge badge-secondary mb-4"><h3
		class="box-title text-center text-light">Produtos Cadastrados</h3></span>

		<div class="content  mb-4 mt-1">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled"><a class="page-link" href="#"
						tabindex="-1">Anterior</a></li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Próximo</a>
						</li>
					</ul>
				</nav>
				<!-- <div class="form-group mt-4">
					<select name="" id=""
					class="form-control  col-md-4 offset-md-4">
					<option value="">Selecione...</option>
				</select>
			</div> -->
		</div>
		<!-- Pagination -->

		<div class="row">

			<?php

		foreach ($produtos as $prod) {

			echo "
				<div class='col-lg-3 col-md-6 m-b-20 fotoPainel produtosCX' id = '{$prod->getIdProd()}'>
				<img src='../img/Produtos/Produto{$prod->getIdProd()}.jpg' class='img-responsive radius hoverImg' onerror=\"this.src='../img/logo.png'\" />
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
<!-- Column -->


<div class="col-lg-12">
	<div class="card">
		<div class="content mb-4">
			<h2 class="card-title text-secondary">Produtos mais Vendidos!</h2>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-3 col-md-6 m-b-20">
					<img src="../img/Produtos/Produto1.jpg" class="img-responsive radius hoverImg" />
					<div class="like-comm">
						<a href="javascript:void(0)" class="link m-r-10"> <i
							class="fa fa-heart text-danger"> </i> 5 Love
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 m-b-20">
					<img src="../img/Produtos/Produto1.jpg" class="img-responsive radius" />
					<div class="like-comm">
						<a href="javascript:void(0)" class="link m-r-10"> <i
							class="fa fa-heart text-danger"> </i> 5 Love
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 m-b-20">
					<img src="../img/Produtos/Produto1.jpg" class="img-responsive radius" />
					<div class="like-comm">
						<a href="javascript:void(0)" class="link m-r-10"> <i
							class="fa fa-heart text-danger"> </i> 5 Love
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 m-b-20">
					<img src="../img/Produtos/Produto1.jpg" class="img-responsive radius" />
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



<?php include_once 'footer.php'; ?>
<script src="js/cadastroProduto.js"></script>





