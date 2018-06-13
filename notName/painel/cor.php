<?php
include_once 'header.php';

require_once '../dal/CorDAL.php';

$cor = CorDAL::buscaCor();
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<h4 class="card-title mb-5">Cores</h4>
				<form action="#" method="POST" id="formCategoria">
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label>Descrição</label> <input type="text"
								class="form-control" id="txtCategoria" name="txtCategoria" placeholder="Nome da Cor">
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>HexaDecimal</label> 
								<input type="text"
								class="form-control" id="txtCor" name="txtCor" placeholder="#ff0000">
							</div>
						</div>


						<div class="col-md-3">
							<div class="form-group">
								<label>Cor</label> 
								<input type="color" id="html5colorpicker" onchange="document.getElementById('txtCor').value = this.value" value="#ff0000" style="width: 100%; height: 40px;">
							</div>
						</div>

					</div>
				</form>

				<div class="form-actions">
					<button type="submit" class="btn btn-success"
					id="btnCadastroCategoria">
					Cadastrar
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
						<th>Nome da Cor</th>
						<th>Hexadecimal</th>
						<th>Cor</th>
						<th class="text-center">Ações</th>

					</tr>
				</thead>

				<tbody>
					<?php 
					foreach ($cor as $cores)
					{
					    echo "<tr>
                                <td>".$cores->getIdCor()."</td>
                                <td>".$cores->getDescCor()."</td>
                                <td>".$cores->getHexCor()."</td>
                                <td ><div class='corCentro' style='width: 35px; height: 35px; background-color:".$cores->getHexCor().";'></div>
                                <td class='text-center'><button class='btn btn-inverse alterar' id='".$cores->getIdCor()."' onclick = 'alert(this.id);'>Alterar</button>
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
<script src="js/cadastroProduto.js"></script>








