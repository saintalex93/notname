<?php
include "superior.php";
include_once "dal/VendaDAL.php";
include_once "model/Venda.php";

$venda = new Venda();

if (isset($_SESSION['USERCOM']['ID'])) {
    $venda->setIdCli($_SESSION['USERCOM']['ID']);

    $carrinho = VendaDAL::buscaVenda($venda);

    if (!$carrinho) {
        echo "
            <script>
                alert('Você ainda não comprou nenhum item. Gaste sua grana com a nossa fodenda loja!');
                window.location.href = 'index.php';
            </script>
        ";
    }
}

?>

 <div id="content">

    <div class="container">
<div class="col-md-12 my-3">


                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
                        </ol>
                    </nav>

                </div>
        <div class="row">
            <div class="col-md-9">

                <div class="card ">

                    <form method="post" action="#" class="mx-3">

                        <h1 class="">Carrinho de compras</h1>
                        <p>Você tem atualmente <b><?php echo $quantidade; ?></b> item (s) no seu carrinho.</p>
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Produto</th>
                                        <th width="20px">Quantidade</th>
                                        <th>Preço unitário</th>
                                        <th>Desconto</th>
                                        <th colspan="2">Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $totalVenda = 0;
                                    foreach ($carrinho as $Minicar) {
                                        $idVenda = $Minicar->getIdVenda();
                                        $idVendaModelo = $Minicar->getIdVendaModelo();
                                        $idModelo = $Minicar->getModelo()[0]->getIdModelo();
                                        $idProduto = $Minicar->getModelo()[0]->getProdutoIdModelo();
                                        $nomeModelo = $Minicar->getModelo()[0]->getNomeModelo();
                                        $quantidade = $Minicar->getModelo()[0]->getQuantidadeVendaModelo();
                                        $valorModelo = $Minicar->getModelo()[0]->getVlrVendaModelo();
                                        $descontoModelo = $Minicar->getModelo()[0]->getDescontoModelo();
                                        $totalModelo = ($valorModelo - $descontoModelo) * $quantidade;
                                        $totalVenda = $totalVenda + $totalModelo;
                                        $valorModelo = "R$ " . number_format($valorModelo, 2, ',', '.');
                                        $descontoModelo = "R$ " . number_format($descontoModelo, 2, ',', '.');
                                        $totalModelo = "R$ " . number_format($totalModelo, 2, ',', '.');
                                        $quantidadeEstoque = $Minicar->getModelo()[0]->getQtdEstoqueModelo();
                                        echo "
                                        <tr>
                                            <td>
                                                <a href='produto.php?id=$idProduto&md=$idModelo'>
                                                <img class='imgPequena' src='img/Modelos/ModeloCapa_$idModelo.jpg' alt=''>
                                                </a>
                                            </td>

                                            <td>
                                                <a href='produto.php?id=$idProduto&md=$idModelo'>$nomeModelo</a>
                                            </td>

                                            <td>
                                                <span>$quantidade</span>
                                            </td>

                                            <td>
                                                $valorModelo
                                            </td>

                                            <td>
                                                $descontoModelo
                                            </td>
                                            
                                            <td>
                                                $totalModelo
                                            </td>

                                            <td>
                                                <a href='#' class='adicionaModelo' value = '$idModelo,$idVenda,$idVendaModelo'>
                                                <i class='fas fa-plus-circle'></i>
                                                </a>
                                            </td>

                                            <td>
                                                <a href='#' class='removeModelo' value = '$idModelo,$idVenda,$idVendaModelo'>
                                                <i class='far fa-trash-alt'></i>
                                                </a>
                                            </td>



                                        </tr>

                                        
                                        ";

                                    }

                                    $totalVenda = "R$ " . number_format($totalVenda, 2, ',', '.');


                                    ?>

                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6">Total</th>
                                        <th colspan="3"><?php echo $totalVenda; ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                   
                    </form>

                        <div class="card-footer">
                           


                            <div class="float-left pull-left col-6">
                                <a href="categoria.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue comprando</a>
                            </div>
                            
                            <div class="float-right pull-right col-6" style="padding:0px 0 20px 0 ">                             
                                <button class="btn btn-default"><i class="fas fa-sync-alt"></i>  Atualizar cesta</button>
                                <button onclick = "window.location.href = 'checkout1.php'"class="btn btn-primary">Fazer o check-out <i class="fas fa-chevron-right"></i></button>
                            </div>
                            
                        </div>


                </div>
            


                <div class="row same-height-row my-4 ">

                    <div class="col-md-3 col-sm-6  d-flex flex-row">
                        <div class="card">

                            <div class="card-body text-center ">
                                <h4 class="card-title my-5">
                                    Você também pode gostar destes produtos </h4>
                            </div>
                        </div>
                    </div>


                     <div class='col-md-3 col-sm-6 mb-3 card-container'>
                        <div class='card'>
                            <a href="produto.php">
                            <div class='card-flip imgP'>
                                <div class='card front'>
                                    <div class='card-block'>
                                        <img class='card-img-top' src='img/Produtos/Produto1.jpg' alt='Foto da Capa do Modelo'>
                                    </div>
                                </div>
                                <div class='card back'>
                                    <div class='card-block'>
                                        <img class='card-img-top ' src='img/Produtos/Produto2.jpg' alt='Foto do Modelo'>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <div class="card-body text-center">
                                <h4 class="card-title">Amarola</h4>
                                <p class="card-text price"><del>R$200</del> R$199,99</p>
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
                                        <img class='card-img-top' src='img/Produtos/Produto1.jpg' alt='Foto da Capa do Modelo'>
                                    </div>
                                </div>
                                <div class='card back'>
                                    <div class='card-block'>
                                        <img class='card-img-top ' src='img/Produtos/Produto2.jpg' alt='Foto do Modelo'>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <div class="card-body text-center">
                                <h4 class="card-title">Amarola</h4>
                                <p class="card-text price"><del>R$200</del> R$199,99</p>
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
                                        <img class='card-img-top' src='img/Produtos/Produto1.jpg' alt='Foto da Capa do Modelo'>
                                    </div>
                                </div>
                                <div class='card back'>
                                    <div class='card-block'>
                                        <img class='card-img-top ' src='img/Produtos/Produto2.jpg' alt='Foto do Modelo'>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <div class="card-body text-center">
                                <h4 class="card-title">Amarola</h4>
                                <p class="card-text price"><del>R$200</del> R$199,99</p>
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


            </div>
       
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mx-3">Resumo do pedido</h3>
                    </div>
                    <br>
                    <p class="text-muted text-center">Envio e custos adicionais são calculados com base nos valores que você inseriu.</p>

                    <div class="table-responsive ">
                        <table class="table text-center">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <th><?php echo $totalVenda; ?></th>
                                </tr>
                                <br>
                                <!-- <tr>
                                    <td>Envio e manipulação</td>
                                    <th>R$10.00</th>
                                </tr> -->
                                <tr>
                                    <td>Imposto</td>
                                    <th>R$0.00</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th><?php echo $totalVenda; ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


                <div class="card my-4">
                    <div class="card-header">
                        <h4>Código do cupom</h4>
                    </div>
                    <p class="text-muted mb-3 text-center">Se você tiver um código de cupom, insira-o na caixa abaixo.</p>
                    <form>
                        <div class="input-group mb-3">

                            <input type="text" class="form-control ml-3">

                            <span class="input-group-btn">

					<button class="btn btn-primary mr-3 " type="button"><i class="fas fa-gift"></i></button>

				    </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include_once "inferior.php"; ?>

    <script src="js/carrinho.js"></script>

