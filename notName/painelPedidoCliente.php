<?php 
include_once "superior.php";
include_once "dal/VendaDAL.php";
include_once "model/Venda.php";

if(isset($_SESSION['USERCOM']['ID'])){


    if(isset($_REQUEST['v']) or isset($_REQUEST['tk'])){

        $venda = new Venda();

        if(!isset($_REQUEST['v'])){
            $venda->setIdVenda(0);

        }
        else{
            $venda->setIdVenda($_REQUEST['v']);
        }

        if(!isset($_REQUEST['tk'])){
            $venda->setCodRastVenda('');

        }
        else{
            $venda->setCodRastVenda($_REQUEST['tk']);
            
        }


        $venda->setIdCli($_SESSION['USERCOM']['ID']);

        $carrinho = VendaDAL::buscaDetalheVenda($venda);

        $idVenda = $carrinho[0]->getIdVenda();
        $data = $carrinho[0]->getDtCompraVenda();
        $data = substr($data, 8,2)."/".substr($data,5,2)."/".substr($data,0,4);


    }
    else{
        echo "
        <script>
        alert('Selecione uma venda para detalhá-la =)');
        window.location.href = 'painelCliente.php';
        </script>
        ";
    }

}

else{
    echo "
    <script>
    alert('Você precisa estar logado para entrar nessa área.');
    window.location.href = 'index.php';
    </script>
    ";
}

?>



<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Carrinho</a></li>
                    <li class="breadcrumb-item active" aria-current="page">#<?php echo $idVenda; ?></li>
                </ol>
            </nav>

        </div>
        <style>.teste ul li{

            width: 100%;
        }</style>
        <div class="col-md-3">

            <div class="card card-default sidebar-menu">

                <div class="card-heading">
                    <h3 class="card-title">Cliente</h3>
                </div>

                <div class="card-body teste">

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="painelCliente.php"><i class="fa fa-heart"></i> Meus pedidos</a>
                        </li>
                        <li>
                            <a href="painelContaCliente.php"><i class="fas fa-user"></i> Minha conta</a>
                        </li>

                        <li>
                            <a href="index.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="col-md-9" >
            <div class="card py-3 px-3 mb-4">
                <h1>Pedido #<?php echo $idVenda; ?></h1>

                <p class="lead">A Encomenda #<?php echo $idVenda; ?> foi colocada a <strong><?php echo $data;?></strong> e está atualmente a <strong>ser preparada</strong>.</p>
                <p class="text-muted">Se você tiver alguma dúvida, não hesite em <a href="contato.php">contactar-nos</a>, o nosso centro de atendimento ao cliente está trabalhando para você 24/7.</p>

                <hr>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Produto</th>
                                <th>Quantidade</th>
                                <th>Preço unitario</th>
                                <th>Desconto</th>
                                <th>Total</th>
                            </tr>
                        </thead>


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
                            $valorModeloRaw = $Minicar->getModelo()[0]->getVlrVendaModelo();
                            $descontoModelo = $Minicar->getModelo()[0]->getDescontoModelo();
                            $totalModelo = ($valorModelo - $descontoModelo) * $quantidade;
                            $totalVenda = $totalVenda + $totalModelo;
                            $valorModelo = "R$ " . number_format($valorModelo, 2, ',', '.');
                            $descontoModelo = "R$ " . number_format($descontoModelo, 2, ',', '.');
                            $totalModelo = "R$ " . number_format($totalModelo, 2, ',', '.');
                            $quantidadeEstoque = $Minicar->getModelo()[0]->getQtdEstoqueModelo();

                            $frete = $Minicar->getVlrFrete();

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

                            </tr>
                            ";

                        }

                        $totalVenda = $totalVenda + $frete;
                        $totalVenda = "R$ " . number_format($totalVenda, 2, ',', '.');
                        $frete = "R$ " . number_format($frete, 2, ',', '.');



                        ?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Frete: </th>
                            <th colspan=""><?php echo $frete; ?></th>

                            <th colspan="2">Total: </th>
                            <th colspan=""><?php echo $totalVenda; ?></th>
                        </tr>



                    </table>

                </div>



            </div>
        </div>
    </div>
</div>



<?php include "inferior.php";?>
