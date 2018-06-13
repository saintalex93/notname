<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494
<?php
include "superior.php";
include_once "dal/ProdutoDAL.php";

$codProduto = $_REQUEST['id'];

if (! isset($_REQUEST['id'])) {
<<<<<<< HEAD
	echo "<script>window.location.href='index.php'</script>";
} else {
	$produto = ProdutoDAL::buscaProduto($codProduto);
=======
    echo "<script>window.location.href='index.php'</script>";
} else {
    $produto = ProdutoDAL::buscaProduto($codProduto);
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494
}

$modelo = $produto[0]->getModelo();

$arrModelo = array();

foreach ($modelo as $m) {
<<<<<<< HEAD

	$arrModelo[] = array(
		"ID" => $m->getIdModelo(),
		"NOME_MODELO" => $m->getNomeModelo(),
		"VALOR_MODELO" => $m->getVlrVendaModelo(),
		"ID_COR" => $m->getCormodelo(),
		"DESC_COR" => $m->getDescCor(),
		"HEX_COR" => $m->getHexCor(),
		"ID_TAMANHO" => $m->getTamanhoModelo(),
		"DESC_TAMANHO" => $m->getDescTamanho(),
		"DESC_TAMANHOCOMPLETO" => $m->getDescTamanhoCompleto()
	);
=======
    
    $arrModelo[] = array(
        "ID" => $m->getIdModelo(),
        "NOME_MODELO" => $m->getNomeModelo(),
        "VALOR_MODELO" => $m->getVlrVendaModelo(),
        "ID_COR" => $m->getCormodelo(),
        "DESC_COR" => $m->getDescCor(),
        "HEX_COR" => $m->getHexCor(),
        "ID_TAMANHO" => $m->getTamanhoModelo(),
        "DESC_TAMANHO" => $m->getDescTamanho()
    );
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494
}
$idModelo = $_REQUEST['md'];

$indice_array = array_search($idModelo, array_column($arrModelo, "ID"));

<<<<<<< HEAD
=======
=======
<?php
include "superior.php";
include_once "dal/ProdutoDAL.php";

$codProduto = $_REQUEST['id'];

if (! isset($_REQUEST['id'])) {
    echo "<script>window.location.href='index.php'</script>";
} else {
    $produto = ProdutoDAL::buscaProduto($codProduto);
}

$modelo = $produto[0]->getModelo();

$arrModelo = array();

foreach ($modelo as $m) {
    
    $arrModelo[] = array(
        "ID" => $m->getIdModelo(),
        "NOME_MODELO" => $m->getNomeModelo(),
        "VALOR_MODELO" => $m->getVlrVendaModelo(),
        "ID_COR" => $m->getCormodelo(),
        "DESC_COR" => $m->getDescCor(),
        "HEX_COR" => $m->getHexCor(),
        "ID_TAMANHO" => $m->getTamanhoModelo(),
        "DESC_TAMANHO" => $m->getDescTamanho(),
        "DESC_TAMANHOCOMPLETO" => $m->getDescTamanhoCompleto()
    );
}
$idModelo = $_REQUEST['md'];

$indice_array = array_search($idModelo, array_column($arrModelo, "ID"));

>>>>>>> d51f79d8eea341be23d342c2050fd805da1775b2
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494
?>

<div id="content">
	<div class="container mb-4">

		<div class="col-md-12 my-3">


			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>

					<li class="breadcrumb-item " aria-current="page">Mulher</li>


					<li class="breadcrumb-item " aria-current="page">Blusa</li>
					<li class="breadcrumb-item active" aria-current="page">Nome do
					produto</li>

				</ol>
			</nav>

		</div>
		<div class="row">
			<?php include "menuCategoria.php";?>
			<div class="col-md-9">

				<div class="row " id="productMain">
					<div class="col-md-6 col-sm-12">
<<<<<<< HEAD
						<div class="card">
							<?php
							echo "
							<img class='card-img-top' src='img/Modelos/ModeloCapa_" . $arrModelo[$indice_array]['ID'] . ".jpg' alt=''>

							";
							?>
=======
						<div class="card ajustesImagemProduto">
                            <?php
                            echo "
                        <img class='card-img-top' src='img/Modelos/ModeloCapa_" . $arrModelo[$indice_array]['ID'] . ".jpg' alt=''>

                        ";
                            ?>
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494

						</div>
					</div>

					<div class="col-sm-6">

						<div class="col-sm-12 col-md-12 mb-3 d-flex flex-row flex-column">
							<div class="card ">
								<div class="card-body text-center">
									<h4 class="card-title">
										<?php echo $produto[0]->getDescProd();?>

									</h4>
									<p class="card-text goToDescription">
										<a href="#details" class="scroll-to">Role para detalhes do
										produto, material e cuidado e dimensionamento</a>
									</p>
									<p class="price">
										<?php echo "R$ ". number_format($arrModelo[$indice_array]['VALOR_MODELO'], 2, ',', '.');?>
									</p>
									<p class="buttons">
										<a href="" class="btn btn-primary"><i
											class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</a>
											<!--                                     <a href="" class="btn btn-default"><i class="fa fa-heart"></i> Add a lista de desejo</a> -->
										</p>


									</div>
								</div>
							</div>

							<div class="row">

								<?php

<<<<<<< HEAD
								for ($i = 1; $i < 4; $i ++) {
									echo "
									<div class='col-md-4 col-sm-6'>
									<div class='card'>
=======
                            <?php
                            
                            for ($i = 1; $i < 4; $i ++) {
                                echo "
                            <div class='col-md-4 col-sm-6'>
                            <div class='card imgProdutoPequena'>
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494

									<img class='card-img-top' src='img/Modelos/ModeloImg" . $arrModelo[$indice_array]['ID'] . "_" . $i . ".jpg' alt=''>

									</div>
									</div>

<<<<<<< HEAD
=======
                            ";
                            }
                            
                            ?>
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494

									";
								}

								?>

							</div>

							<div class="col-md-12 mt-3 text-center">

<<<<<<< HEAD
								<div class="card">
=======
                                <?php
                                
                                foreach ($arrModelo as $arM) {
                                    echo "
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494


									<div class="row p-2">
									<h3 class="text-center col-md-12 text-secondary card-title">Cores e Tamanhos</h3>

<<<<<<< HEAD
										<div class="container col-md-6 text-center">
=======
                             ";
                                }
                                
                                ?>
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494


											<?php

											foreach ($arrModelo as $arM) {
												echo "

												<button class='btn btn-primary desab$arM[ID]' style = 'background: $arM[HEX_COR]; color: $arM[HEX_COR]' onclick = \" location.href = 'produto.php?id=$codProduto&md=$arM[ID]' \">R</button>
												";
											}

<<<<<<< HEAD
											?>
=======
                                <?php
                                
                                foreach ($arrModelo as $arM) {
                                    echo "
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494

										</div>

<<<<<<< HEAD
										<div class="container col-md-6 text-center">
=======
                             ";
                                }
                                
                                ?>
>>>>>>> 548186f3fcd61543aebedbfaa23dd27b14647494

											<?php

											foreach ($arrModelo as $arM) {
												echo "

												<button class = 'btn btn-secondary desab$arM[ID]' onclick = \" location.href = 'produto.php?id=$codProduto&md=$arM[ID]'\">$arM[DESC_TAMANHO]</button>

												";
											}

											?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="card container">
						<p>
							<h4>Detalhes do produto</h4>

							<ul>
								<?php echo $produto[0]->getDescCompletaProd();?>
							</ul>

							<h4>Material e cuidados</h4>
							<ul>
								<li> <?php echo $produto[0]->getMaterial();?></li>

							</ul>
							<h4>Tamanho e ajuste</h4>
							<ul>
								<li><?php echo "{$arrModelo[$indice_array]['DESC_TAMANHO']} - {$arrModelo[$indice_array]['DESC_TAMANHOCOMPLETO']}";?></li>
							</ul>

							<blockquote>
								<p>
									<em>Defina o estilo nesta temporada com a nova gama de topos da
										Armani, trabalhada com detalhes intrincados. Criar um olhar
										chique declaração unindo este número de renda com jeans skinny e
										bombas.
									</em>
								</p>
							</blockquote>

							<hr>
							<div class="social">
								<h4>Mostre para seus amigos</h4>
								<p>
									<a href="#" class="facebook" data-animate-hover="pulse"><i
										class="fab fa-facebook-f"></i></a> <a href="#" class="instagram"
										data-animate-hover="pulse"><i class="fab fa-instagram"></i></a>
										<a href="#" class="gplus" data-animate-hover="pulse"><i
											class="fab fa-google-plus-g"></i></a> <a href="#"
											class="twitter" data-animate-hover="pulse"><i
											class="fab fa-twitter"></i></a> <a href="#" class="email"
											data-animate-hover="pulse"><i class="fas fa-envelope"></i></a>
										</p>
									</div>
								</div>

								<div class="row same-height-row my-4">

									<div class="col-md-3 col-sm-6  d-flex flex-row">
										<div class="card">

											<div class="card-body text-center">
												<h4 class="card-title">Você também pode gostar destes produtos</h4>
											</div>
										</div>
									</div>
									<div class='col-md-3 col-sm-6 mb-3 card-container'>
										<div class='card'>
											<a href="produto.php">
												<div class='card-flip imgP'>
													<div class='card front'>
														<div class='card-block'>
															<img class='card-img-top' src='img/Produtos/Produto1.jpg'
															alt='Foto da Capa do Modelo'>
														</div>
													</div>
													<div class='card back'>
														<div class='card-block'>
															<img class='card-img-top ' src='img/Produtos/Produto2.jpg'
															alt='Foto do Modelo'>
														</div>
													</div>
												</div>
											</a>
											<div class="card-body text-center">
												<h4 class="card-title">Amarola</h4>
												<p class="card-text price">
													<del>R$200</del>
													R$199,99
												</p>
											</div>
											<div class="fitaTagProduto novo">
												<div class="fitaTag">Novo</div>
												<div class="fitaTagProduto-background"></div>
											</div>
											<div class="fitaTagProduto promocaoTag">
												<div class="fitaTag">Promoção</div>
												<div class="fitaTagProduto-background"></div>
											</div>
										</div>
									</div>
									<div class='col-md-3 col-sm-6 mb-3 card-container'>
										<div class='card'>
											<a href="produto.php">
												<div class='card-flip imgP'>
													<div class='card front'>
														<div class='card-block'>
															<img class='card-img-top' src='img/Produtos/Produto1.jpg'
															alt='Foto da Capa do Modelo'>
														</div>
													</div>
													<div class='card back'>
														<div class='card-block'>
															<img class='card-img-top ' src='img/Produtos/Produto2.jpg'
															alt='Foto do Modelo'>
														</div>
													</div>
												</div>
											</a>
											<div class="card-body text-center">
												<h4 class="card-title">Amarola</h4>
												<p class="card-text price">R$199,99</p>
											</div>
											<div class="fitaTagProduto novo">
												<div class="fitaTag">Novo</div>
												<div class="fitaTagProduto-background"></div>
											</div>
											<div class="fitaTagProduto promocaoTag">
												<div class="fitaTag">Promoção</div>
												<div class="fitaTagProduto-background"></div>
											</div>
										</div>
									</div>


									<div class='col-md-3 col-sm-6 mb-3 card-container'>
										<div class='card'>
											<a href="produto.php">
												<div class='card-flip imgP'>
													<div class='card front'>
														<div class='card-block'>
															<img class='card-img-top' src='img/Produtos/Produto1.jpg'
															alt='Foto da Capa do Modelo'>
														</div>
													</div>
													<div class='card back'>
														<div class='card-block'>
															<img class='card-img-top ' src='img/Produtos/Produto2.jpg'
															alt='Foto do Modelo'>
														</div>
													</div>
												</div>
											</a>
											<div class="card-body text-center">
												<h4 class="card-title">Amarola</h4>
												<p class="card-text price">
													<del>R$200</del>
													R$199,99
												</p>
											</div>
											<div class="fitaTagProduto novo">
												<div class="fitaTag">Novo</div>
												<div class="fitaTagProduto-background"></div>
											</div>
											<div class="fitaTagProduto promocaoTag">
												<div class="fitaTag">Promoção</div>
												<div class="fitaTagProduto-background"></div>
											</div>
										</div>
									</div>

								</div>

				<!-- 				<div class="row same-height-row">
					<div class="col-md-3 col-sm-6 d-flex flex-row">
						<div class="card">

							<div class="card-body text-center">
								<h4 class="card-title">Produtos vistos recentemente</h4>


							</div>
						</div>
					</div>


					<div class='col-md-3 col-sm-6 mb-3 card-container'>
						<div class='card'>
							<a href="produto.php">
								<div class='card-flip imgP'>
									<div class='card front'>
										<div class='card-block'>
											<img class='card-img-top' src='img/Produtos/Produto1.jpg'
												alt='Foto da Capa do Modelo'>
										</div>
									</div>
									<div class='card back'>
										<div class='card-block'>
											<img class='card-img-top ' src='img/Produtos/Produto2.jpg'
												alt='Foto do Modelo'>
										</div>
									</div>
								</div>
							</a>
							<div class="card-body text-center">
								<h4 class="card-title">Amarola</h4>
								<p class="card-text price">
									<del>R$200</del>
									R$199,99
								</p>
							</div>
							<div class="fitaTagProduto novo">
								<div class="fitaTag">Novo</div>
								<div class="fitaTagProduto-background"></div>
							</div>
							<div class="fitaTagProduto promocaoTag">
								<div class="fitaTag">Promoção</div>
								<div class="fitaTagProduto-background"></div>
							</div>
						</div>
					</div>

					<div class='col-md-3 col-sm-6 mb-3 card-container'>
						<div class='card'>
							<a href="produto.php">
								<div class='card-flip imgP'>
									<div class='card front'>
										<div class='card-block'>
											<img class='card-img-top' src='img/Produtos/Produto1.jpg'
												alt='Foto da Capa do Modelo'>
										</div>
									</div>
									<div class='card back'>
										<div class='card-block'>
											<img class='card-img-top ' src='img/Produtos/Produto2.jpg'
												alt='Foto do Modelo'>
										</div>
									</div>
								</div>
							</a>
							<div class="card-body text-center">
								<h4 class="card-title">Amarola</h4>
								<p class="card-text price">
									<del>R$200</del>
									R$199,99
								</p>
							</div>
							<div class="fitaTagProduto novo">
								<div class="fitaTag">Novo</div>
								<div class="fitaTagProduto-background"></div>
							</div>
							<div class="fitaTagProduto promocaoTag">
								<div class="fitaTag">Promoção</div>
								<div class="fitaTagProduto-background"></div>
							</div>
						</div>
					</div>



					<div class='col-md-3 col-sm-6 mb-3 card-container'>
						<div class='card'>
							<a href="produto.php">
								<div class='card-flip imgP'>
									<div class='card front'>
										<div class='card-block'>
											<img class='card-img-top' src='img/Produtos/Produto1.jpg'
												alt='Foto da Capa do Modelo'>
										</div>
									</div>
									<div class='card back'>
										<div class='card-block'>
											<img class='card-img-top ' src='img/Produtos/Produto2.jpg'
												alt='Foto do Modelo'>
										</div>
									</div>
								</div>
							</a>
							<div class="card-body text-center">
								<h4 class="card-title">Amarola</h4>
								<p class="card-text price">
									<del>R$200</del>
									R$199,99
								</p>
							</div>
							<div class="fitaTagProduto novo">
								<div class="fitaTag">Novo</div>
								<div class="fitaTagProduto-background"></div>
							</div>
							<div class="fitaTagProduto promocaoTag">
								<div class="fitaTag">Promoção</div>
								<div class="fitaTagProduto-background"></div>
							</div>
						</div>
					</div>



				</div> -->

			</div>

		</div>
	</div>

</div>

<?php include_once "inferior.php";?>



<script>


	$( document ).ready(function() {
		$(".desab<?php echo $idModelo?>").attr('disabled', 'disabled');
		$(".desab<?php echo $idModelo?>").css('border', '3px solid black');

	});


</script>


