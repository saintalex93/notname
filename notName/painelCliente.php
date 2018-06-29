<?php 
include_once "superior.php";
include_once "dal/VendaDAL.php";
include_once "model/Venda.php";

if(isset($_SESSION['USERCOM']['ID'])){
    $venda = new Venda();
    $venda->setIdCli($_SESSION['USERCOM']['ID']);

    $vendas = VendaDAL::buscaTodasVendas($venda);

}

?>


<div class="container">
    <div class="row">
     <div class="col-md-12 my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Carrinho</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
            </ol>
        </nav>

    </div>
    <style>.teste ul li{

        width: 100%;
        
    }
    
    
    
    .teste1 li a{

        text-align: left;
    }
    
</style>
<div class="col-md-3">

    <div class="card card-default sidebar-menu">

        <div class="card-heading">
            <h3 class="card-title">Cliente</h3>
        </div>

        <div class="card-body teste">

            <ul class="nav nav-pills nav-stacked">
                <li class="teste1 active ">
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

<div class="col-md-9">
    <div class="card py-3 px-3 mb-4">
        <h1>Meus pedidos</h1>

        <p class="lead">Seus pedidos em um só lugar.</p>
        <p class="text-muted">Se você tiver alguma dúvida, não hesite em <a href="contato.php">contactar-nos</a>, o nosso centro de atendimento ao cliente está trabalhando para você 24/7.</p>

        <hr>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Data</th>
                        <th>Frete</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 

                    foreach ($vendas as $v) {
                        $total = $v->getVlrTotalVenda() + $v->getVlrFrete();
                        $total = "R$ ".number_format($total, 2, ',','.');
                        $frete = strtoupper($v->getFrete());
                        switch ($v->getStatusVenda()) {

                            case 'PAGA':
                            echo "
                            <tr>
                            <th>{$v->getIdVenda()}</th>
                            <td>{$v->getDtCompraVenda()}</td>
                            <td>{$frete}</td>
                            <td>{$total}</td>
                            <td><span class='badge badge-success'>{$v->getStatusVenda()}</span>
                            </td>
                            <td><a href='painelPedidoCliente.php?v={$v->getIdVenda()}' class='btn btn-primary btn-sm'>Ver</a>
                            </td>
                            </tr>

                            ";


                            break;

                            case 'AGUARDANDO PAGAMENTO':
                            echo "
                            <tr>
                            <th>{$v->getIdVenda()}</th>
                            <td>{$v->getDtCompraVenda()}</td>
                            <td>{$frete}</td>
                            <td>{$total}</td>
                            <td><span class='badge badge-warning'>{$v->getStatusVenda()}</span>
                            </td>
                            <td><a href='painelPedidoCliente.php?v={$v->getIdVenda()}' class='btn btn-primary btn-sm'>Ver</a>
                            </td>
                            </tr>

                            ";
                            break;

                            case 'CANCELADA':
                            echo "
                            <tr>
                            <th>{$v->getIdVenda()}</th>
                            <td>{$v->getDtCompraVenda()}</td>
                            <td>{$frete}</td>
                            <td>{$total}</td>
                            <td><span class='badge badge-danger'>{$v->getStatusVenda()}</span>
                            </td>
                            <td><a href='painelPedidoCliente.php?v={$v->getIdVenda()}' class='btn btn-primary btn-sm'>Ver</a>
                            </td>
                            </tr>

                            ";
                            break;

                            
                            default:
                            case 'CANCELADA':
                            echo "
                            <tr>
                            <th>{$v->getIdVenda()}</th>
                            <td>{$v->getDtCompraVenda()}</td>
                            <td>{$frete}</td>
                            <td>{$total}</td>
                            <td><span class='badge badge-secondary'>{$v->getStatusVenda()}</span>
                            </td>
                            <td><a href='painelPedidoCliente.php?v={$v->getIdVenda()}' class='btn btn-primary btn-sm'>Ver</a>
                            </td>
                            </tr>

                            ";
                            break;
                        }


                    }
                    ?>



                </tbody>
            </table>
        </div>
    </div>
</div>


</div></div>








<?php include "inferior.php";?>