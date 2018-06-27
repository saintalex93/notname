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

$cepOrigem = "02859150";

$cepDestino = $end[0]->getCep();
$cepDestino = str_replace("-", "", $cepDestino);
$cepDestino = str_replace(".", "", $cepDestino);

$quantidadeCamisetas = count($ven);
$peso = $quantidadeCamisetas * 0.300;

$largura = '0';
$comprimento = '0';
$altura = '0';

if ($quantidadeCamisetas < 4) {
    $largura = '35,3';
    $comprimento = '18,5';
    $altura = '2';
    $valor = 0;
    // echo "plastico";
} elseif ($quantidadeCamisetas < 6) {
    $largura = '18';
    $comprimento = '18,5';
    $altura = '9';
    $valor = 4.60;
    // echo "Caixa Flex";

} elseif ($quantidadeCamisetas < 9) {
    $largura = '18';
    $comprimento = '16';
    $altura = '9';
    $valor = 4.60;
    // echo "caixa 1";

} elseif ($quantidadeCamisetas >= 9) {
    $largura = '27';
    $comprimento = '18';
    $altura = '9';
    $valor = 5.80;
    // echo "Caixa 2";

}



$sedex = calculaFrete(
    '40010',
    "$cepOrigem",
    "$cepDestino",
    "$peso",
    "$altura",
    "$largura",
    "$comprimento",
/*valor declarado */
    0
);

$sedex10 = calculaFrete(
    '40215',
    "$cepOrigem",
    "$cepDestino",
    "$peso",
    "$altura",
    "$largura",
    "$comprimento",
/*valor declarado */
    0
);

$pac = calculaFrete(
    '41106',
    "$cepOrigem",
    "$cepDestino",
    "$peso",
    "$altura",
    "$largura",
    "$comprimento",
/*valor declarado */
    0
);

if ($pac) {
    $pacValor = $pac['valor'];
    $pacValor = str_replace(".", "", $pacValor);
    $pacValor = str_replace(",", ".", $pacValor);
    $pacValor = $pacValor + $valor;
    $valorPac = "R$ " . number_format($pacValor, 2);
    $prazoPac = $pac['prazo'];

} else {
// todo
    $valorPac = 'R$ 0.00';
    $prazoPac = "Indisponível";
}

if ($sedex) {
    $sedexValor = $sedex['valor'];
    $sedexValor = str_replace(".", "", $sedexValor);
    $sedexValor = str_replace(",", ".", $sedexValor);
    $sedexValor = $sedexValor + $valor;
    $valorSedex = "R$ " . number_format($sedexValor, 2);
    $prazoSedex = $sedex['prazo'];
} else {
// todo
    $valorSedex = 'R$ 0.00';
    $prazoSedex = "Indisponível";

}

if ($sedex10) {
    $sedex10Valor = $sedex10['valor'];
    $sedex10Valor = str_replace(".", "", $sedex10Valor);
    $sedex10Valor = str_replace(",", ".", $sedex10Valor);
    $sedex10Valor = $sedex10Valor + $valor;
    $valorSedex10 = "R$ " . number_format($sedex10Valor, 2);
    $prazoSedex10 = $sedex10['prazo'];

} else {
// todo
    $valorSedex10 = 'R$ 0.00';
    $prazoSedex10 = "Indisponível";

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

                                    <span class="d-block px-3"><b>Valor: </b><?php echo $valorPac; ?></span>
                                    <span class="d-block px-3"><b>Prazo: </b><?php echo $prazoPac; ?> </span>


                                    <div class="card-footer text-center">

                                        <input type="radio" name="entrega" value="entrega1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 ml-5 my-3">
                                <div class="card shipping-method   ">

                                    <h4 class="px-3 pt-3">SEDEX</h4>

                                    <span class="d-block px-3"><b>Valor: </b><?php echo $valorSedex; ?></span>
                                    <span class="d-block px-3"><b>Prazo: </b><?php echo $prazoSedex; ?> </span>


                                    <div class="card-footer text-center">

                                        <input type="radio" name="entrega" value="entrega1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 ml-5 my-3" >
                                <div class="card shipping-method">

                                    <h4 class="px-3 pt-3">SEDEX 10</h4>

                                    <span class="d-block px-3"><b>Valor: </b><?php echo $valorSedex10; ?></span>
                                    <span class="d-block px-3"><b>Prazo: </b><?php echo $prazoSedex10; ?> </span>


                                    <div class="card-footer text-center">

                                        <input type="radio" name="entrega" value="entrega1">
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-5 ml-5 my-3">
                                <div class="card shipping-method">

                                    <h4 class="px-3 pt-3">Retirar no Local</h4>

                                    <span class="d-block px-3">Rua Barbosa Gurgel</span>
                                    <span class="d-block px-3">(11) 92528-9000 - Gabriela</span>

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
