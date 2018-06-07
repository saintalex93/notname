<?php
include_once "superior.php";
include_once 'library/Conexao.class.php';
include_once 'dal/ModeloDAL.php';

$modelo = ModeloDAL::buscaModeloIndex();

?>


<div id="carouselSite" class="carousel slide my-4" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block img-fluid"
				src="http://via.placeholder.com/1920x700" alt="slider">
			<div class="carousel-caption">
				<h4>primeiro slider</h4>
				<p>conteudo</p>
			</div>
		</div>
		<div class="carousel-item ">
			<img class="d-block img-fluid"
				src="http://via.placeholder.com/1920x700" alt="slider">
			<div class="carousel-caption">
				<h4>segundo slider</h4>
				<p>conteudo</p>
			</div>
		</div>
		<div class="carousel-item ">
			<img class="d-block img-fluid"
				src="http://via.placeholder.com/1920x700" alt="slider">
			<div class="carousel-caption">
				<h4>terceiro slider</h4>
				<p>conteudo</p>
			</div>
		</div>

	</div>
	<a class="carousel-control-prev" href="#carouselSite" role="button"
		data-slide="prev"> <span class="carousel-control-prev-icon"
		aria-hidden="true"></span> <span class="sr-only">Previous</span>
	</a> <a class="carousel-control-next" href="#carouselSite"
		role="button" data-slide="next"> <span
		class="carousel-control-next-icon" aria-hidden="true"></span> <span
		class="sr-only">Next</span>
	</a>
</div>
<div id="vantagens">
	<div class="row mt-4 ">


		<div
			class="col-sm-12 col-md-4 mb-3 d-flex align-self-stretch  flex-column">
			<div class="card card2 ">
				<div class="card-body text-center">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>

					<h3 class="card-title">Feito com amor</h3>
					<p class="card-text">Todas as nossas peças são desenvolvidas com
						muito carinho, desde o brainstorming inicial até a revisão final
						da produção. Cada design têm um propósito maior: refletir valores
						que acreditamos e buscamos resgatar na humanidade.</p>
					<a class="card-link" href="">link card</a>

				</div>
			</div>
		</div>

		<div
			class="col-sm-12 col-md-4 mb-3 d-flex align-self-stretch  flex-column">
			<div class="card  card2 ">
				<div class="card-body text-center">

					<div class="icon">
						<i class="fa fa-cut"></i>
					</div>
					<h3 class="card-title">Corte e Costura</h3>
					<p class="card-text">Mais do que uma alma social, todos os nossos
						produtos são desenvolvidos a partir das melhores matérias primas,
						priorizando sempre qualidade, conforto, durabilidade e minimizando
						o impacto ambiental.</p>
					<a class="card-link" href="">link card</a>

				</div>
			</div>
		</div>
		<div
			class="col-sm-12 col-md-4 mb-3 d-flex align-self-stretch  flex-column">
			<div class="card card2">
				<div class="card-body text-center">

					<div class="icon">
						<i class="fa fa-truck"></i>
					</div>
					<h3 class="card-title">Primeira troca grátis</h3>
					<p class="card-text">A 1º troca é por nossa conta.</p>
					<a class="card-link" href="">link card</a>

				</div>
			</div>
		</div>
	</div>

</div>


<div class="jumbotron jumbotron-fluid text-center rounded-0">
	<h1 class="display-3">bootstrap 4</h1>
	<p class="lead">um texto para dar destaque no elemento jumbotron</p>
	<p class="lead">
		<a class="btn btn-primary" href="">mais um botão</a>
	</p>
</div>



<div class="row">


	<div class="col-md-12">
		<h2>Destaque da semana</h2>
	</div>



	<!--produto1-->
    
    <?php
    foreach ($modelo as $md) {
        
        echo "

    <div class='col-sm-6 col-md-3 mb-3 card-container'>
        <div class='card'>
            <div class='card-flip'>


                <div class='card front'>
                    <div class='card-block'>
                        <img class='card-img-top' src='img/Produtos/Produto{$md->getProdutoIdModelo()}.jpg' alt='Foto da Capa do Modelo'>
                    </div>
                </div>


                <div class='card back'>
                    <div class='card-block'>
                        <img class='card-img-top ' src='img/Modelos/ModeloCapa_{$md->getIdModelo()}.jpg' alt='Foto do Modelo'>
                    </div>
                </div>


            </div>

            <div class='card-body text-center'>
                <h4 class='card-title'>{$md->getNomeModelo()}</h4>
        ";
        
        if ($md->getDescontoModelo() != "0.00") {
            $valor = 'R$' . number_format($md->getVlrVendaModelo(), 2, ',', '.');
            $desconto = $md->getVlrVendaModelo() - $md->getDescontoModelo();
            $desconto = 'R$' . number_format($desconto, 2, ',', '.');
            echo "
                <p class='card-text price'><del>$valor</del> $desconto</p>
                <a class='card-link' href='produto.php?id={$md->getProdutoIdModelo()}'>ver mais detalhes</a>
            </div>

            <div class='fitaTagProduto novo'>
                <div class='fitaTag'>Novo</div>
                <div class='fitaTagProduto-background'></div>
            </div>

           

            <div class='fitaTagProduto promocaoTag'>
                <div class='fitaTag'>Promoção</div>
                <div class='fitaTagProduto-background'></div>
            </div>";
        } else {

            $valor = 'R$' . number_format($md->getVlrVendaModelo(), 2, ',', '.');
            echo "
                <p class='card-text price'>$valor</p>
          <a class='card-link' href='produto.php?id={$md->getProdutoIdModelo()}'>ver mais detalhes</a>

            </div>

            <div class='fitaTagProduto novo'>
                <div class='fitaTag'>Novo</div>
                <div class='fitaTagProduto-background'></div>
            </div>

           

          ";
        }
        
        echo "


        </div>

    </div>

";
    }
    
    ?>





</div>



<?php include_once "inferior.php";?>
