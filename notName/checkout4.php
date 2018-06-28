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
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Carrinho</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Revisão da encomenda</li>
                    </ol>
                </nav>

            </div>


            <div class="col-md-9">

                <div class="card btnCheckout container">
                    <form method="post" action="checkout4.php">
                        <h1 class="mx-3 my-3">Checkout - Revisão do pedido</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li class="disabled text-center"><a href="#"><i class="fas fa-map-marker"></i><br>Endereço</a>
                            </li>
                            <li class="disabled checkout1 text-center"><a href="#"><i class="fas fa-truck"></i><br>Método de Entrega</a>
                            </li>
                            <li class="disabled checkout1 text-center"><a href="#"><i class="far fa-money-bill-alt"></i><br>Método de pagamento</a>
                            </li>
                            <li class="active checkout1 text-center"><a href="#"><i class="fas fa-eye"></i><br>Revisão da encomenda</a>
                            </li>
                        </ul>




                        <div class="card-footer">
                            <div class="pull-left">
                                <a href="checkout3.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Voltar ao método de pagamento</a>
                            </div>
                            <div class="pull-right mb-2">
                                <button type="submit" class="btn btn-primary">Fazer um pedido<i class="fa fa-chevron-right"></i>
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>


            <div class="col-md-3">

                    
                <?php include_once 'descritivoVenda.php'; ?>


            </div>
        </div>
    </div>
</div>
<?php include_once "inferior.php"; ?>
