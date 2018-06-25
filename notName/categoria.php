<?php include "superior.php";

include_once 'library/Conexao.class.php';
include_once 'dal/ModeloDAL.php';

$modelo = ModeloDAL::buscaModelo();


?>
<div id="content">
    <div class="container">

        <div class="col-md-12 my-3">


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
            </nav>

        </div>
        <div class="row">
            <?php  include "menuCategoria.php";?>

            <div class="col-md-9">
                <div class="card">
                    <h1>Produtos</h1>
                    <p>Confira todos os Produtos que fizemos especialmente para você!</p>
                </div>

                <div class="card info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            Mostrando <strong>12</strong> de <strong>25</strong> Produtos
                        </div>

                        <div class="col-sm-12 col-md-8">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-6 col-sm-6">
                                        <div>
                                            <strong>Mostrar</strong> <a href="#" class="btn btn-default btn-sm btn-primary">12</a> <a href="#" class="btn btn-default btn-sm">25</a> <a href="#" class="btn btn-default btn-sm">Todos</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="">
                                            <strong>Ordenar por</strong>
                                            <select name="sort-by" class="form-control">
                                                    <option>Preço</option>
                                                    <option>Nome</option>
                                                    <option>Mais vendido</option>
                                                </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

  <?php
    foreach ($modelo as $md) {
        echo "

                     <div class='col-sm-12 col-md-4 mb-3 text-center'>
                        <div class='card card-container '>
                         <a class='card-link' href='produto.php?id={$md->getProdutoIdModelo()}&md={$md->getIdModelo()}'>
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
                         </a>

                            <h4 class='card-title'>{$md->getNomeModelo()}</h4>";

        if ($md->getDescontoModelo() != "0.00") {
            $valor = 'R$' . number_format($md->getVlrVendaModelo(), 2, ',', '.');
            $desconto = $md->getVlrVendaModelo() - $md->getDescontoModelo();
            $desconto = 'R$' . number_format($desconto, 2, ',', '.');
            echo "
                <p class='card-text price'><del>$valor</del> $desconto</p>
                <a class='card-link' href='produto.php?id={$md->getProdutoIdModelo()}&md={$md->getIdModelo()}'>ver mais detalhes</a>
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
          <a class='card-link' href='produto.php?id={$md->getProdutoIdModelo()}&md={$md->getIdModelo()}'>ver mais detalhes</a>

            </div>

            <div class='fitaTagProduto novo'>
                <div class='fitaTag'>Novo</div>
                <div class='fitaTagProduto-background'></div>
            </div>

           

          ";
        }

        echo "

        </div>


";
    }
    ?>
                   


                </div>










                <div class="text-center">

                    <p class="">
                        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Carregar mais</a>
                    </p>

                    <ul class="paginacao">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>


<?php include_once "inferior.php";?>
