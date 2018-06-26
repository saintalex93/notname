<?php 
include "superior.php";
include_once "model/Cliente.php";
include_once "dal/ClienteDAL.php";
include_once "model/Endereco.php";
include_once "dal/EnderecoDAL.php";
include_once "model/Venda.php";
include_once "dal/VendaDAL.php";
include_once "controller/correios.php";



$cliente = new Cliente();
$endereco = new Endereco();
$venda = new Venda();

$idCli = $_SESSION['USERCOM']['ID'];

$cliente->setIdCli($idCli);
$endereco->setIdCli($idCli);
$venda->setIdCli($idCli);

$end = EnderecoDAL::buscaEndereco($endereco);
$ven = VendaDAL::buscaVendaCarrinho($venda);

$cepOrigem = "01047000";

$cepDestino = $end[0]->getCep();
$cepDestino = str_replace("-", "",$cepDestino);
$cepDestino = str_replace(".", "", $cepDestino);
echo $cepDestino;
echo $cepOrigem;

$quantidadeCamisetas = count($ven);




# 41106 PAC sem contrato
# 40010 SEDEX sem contrato
# 40045 SEDEX a Cobrar, sem contrato
# 40215 SEDEX 10, sem contrato

/* codigo do servico desejado */
/* cep de origem, apenas numeros */
/* cep de destino, apenas numeros */
/* valor dado em Kg incluindo a embalagem. 0.1, 0.3, 1, 2 ,3 , 4 */
/* altura do produto em cm incluindo a embalagem */
/* altura do produto em cm incluindo a embalagem */
/* comprimento do produto incluindo embalagem em cm */
/* indicar 0 caso nao queira o valor declarado */



$_resultado = calculaFrete(
    '40010',
    "$cepOrigem",
    "$cepDestino",
    '1',
    '15',
    '22',
    '32',
    0
);

var_dump($_resultado);


?>

<div id="content">
    <div class="container mb-4">
        <div class="row">
           <div class="col-md-12 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Carrinho</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Método de Entrega</li>
                </ol>
            </nav>

        </div>
        <div class="col-md-9">

            <div class="card btnCheckout container">
                <form method="post" action="checkout3.php">
                    <h1 class="mx-3 my-3">Checkout - Método de entrega</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li class="disabled text-center" ><a href="#"><i class="fas fa-map-marker"></i><br>Endereço</a>
                        </li>
                        <li class="active checkout1 text-center"><a href="#"><i class="fas fa-truck"></i><br>Método de Entrega</a>
                        </li>
                        <li class="disabled checkout1 text-center"><a href="#"style="cursor:no-drop;"><i class="far fa-money-bill-alt"></i><br>Método de pagamento</a>
                        </li>
                        <li class="disabled checkout1 text-center"><a href="#"style="cursor:no-drop;"><i class="fas fa-eye"></i><br>Revisão da encomenda</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-5 ml-5 my-3">
                                <div class="card shipping-method   ">

                                    <h4 class="px-3 pt-3">PAC</h4>

                                    <p class="px-3 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                    <div class="card-footer text-center">

                                        <input type="radio" name="entrega" value="entrega1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 ml-5 my-3">
                                <div class="card shipping-method   ">

                                    <h4 class="px-3 pt-3">SEDEX</h4>

                                    <p class="px-3 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                    <div class="card-footer text-center">

                                        <input type="radio" name="entrega" value="entrega1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 ml-5 my-3">
                                <div class="card shipping-method   ">

                                    <h4 class="px-3 pt-3">SEDEX 10</h4>

                                    <p class="px-3 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                    <div class="card-footer text-center">

                                        <input type="radio" name="entrega" value="entrega1">
                                    </div>
                                </div>
                            </div>
                           

                            <div class="col-sm-5 ml-5 my-3">
                                <div class="card shipping-method">

                                    <h4 class="px-3 pt-3">Retirar no Local</h4>

                                    <p class="px-3 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                    <div class="card-footer text-center">

                                        <input type="radio" name="entrega" value="entrega3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.content -->

                    <div class="card-footer">
                        <div class="pull-left">
                            <a href="checkout1.php" class="btn btn-default"><i class="fas fa-chevron-left"></i>Voltar para Endereços</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continuar para o método de pagamento<i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col-md-9 -->

        <div class="col-md-3">

                <?php include_once 'descritivoVenda.php'; ?>

        </div>
    </div>
</div>
</div>
<?php include_once "inferior.php"; ?>
