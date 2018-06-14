<?php
include_once 'header.php';

require_once '../dal/TamanhoDAL.php';

$tamanho = TamanhoDAL::buscaTamanho();

$idTam = $tamanho[0]->getIdTamanho();

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<h4 class="card-title mb-5">Tamanho</h4>
				<form action="#" method="POST" id="formTamanho">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label>Descrição</label>
								<input type="hidden" name="idTamanho" id="idTamanho" value="<?php echo $idTam;?>">
								<input type="text"	class="form-control" id="txtTamanho" name="txtTamanho" placeholder="PP ou G" maxlength="4">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Tamanho</label> 
								<input type="text"	class="form-control" id="txtMedida" name="txtMedida" placeholder="90cm x 90cm" maxlength="30">
							</div>
						</div>

					</div>
				</form>

				<div class="form-actions">
					<button type="submit" class="btn btn-success"
					id="btnCadastraTamanho" value="1">
					Cadastrar
					</button>
					<button type="button" id="btnCacelarTamanho" class="btn btn-inverse">Cancelar</button>
				</div>
				<div>
					<p id="returnCadTamanho"></p>
				</div>

			<div class="table-responsive m-t-40">
				<h6 class="card-subtitle">Categorias Cadastradas</h6>

				<table id="tableTamanho"
				class="display nowrap table table-hover table-striped table-bordered text-center"
				cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Descricao</th>
						<th>Tamanho</th>
						<th class="text-center">Ações</th>

					</tr>
				</thead>

				<tbody>
					<?php 
					foreach ($tamanho as $tamanhos)
					{
						echo "<tr id='rowTamanho".$tamanhos->getIdTamanho()."'>
						<td>".$tamanhos->getIdTamanho()."</td>
						<td>".$tamanhos->getSiglaTamanho()."</td>
						<td>".$tamanhos->getDescTamanho()."</td>
						<td class='text-center'><button class='btn btn-inverse alterar' id='".$tamanhos->getIdTamanho()."' onclick = 'alteraTamanho(this.id);'>Alterar</button>
						</tr>";
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



<?php include_once 'footer.php';?>
<script src="js/ajaxTamanho.js"></script>
<script src="js/alteraTamanho.js"></script>








