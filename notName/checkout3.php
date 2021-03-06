<?php include "superior.php"; 
include_once "dal/VendaDAL.php";
include_once "model/Venda.php";
include_once "dal/ClienteDAL.php";
include_once "model/Cliente.php";
include_once "dal/EnderecoDAL.php";
include_once "model/Endereco.php";


$venda = new Venda();
$cliente = new Cliente();
$endereco = new Endereco();



if (isset($_SESSION['USERCOM']['ID'])) {
    $idCliente = $_SESSION['USERCOM']['ID'];
    $venda->setIdCli($idCliente);
    $cliente->setIdCli($idCliente);
    $endereco->setIdCli($idCliente);
    $carrinho = VendaDAL::buscaVenda($venda);
    $totalVendaCarrinho = $carrinho[0]->getVlrTotalVenda()+$carrinho[0]->getVlrFrete();

    $cli = ClienteDAL::buscaCliente($cliente);
    $end = EnderecoDAL::buscaEndereco($endereco);

    $nome=$cli[0]->getNomeCli();
    $cpf=$cli[0]->getCpfCli();
    $email=$cli[0]->getEmailCli();
    $telefone=$cli[0]->getTelResiCli();
    $nascimento=$cli[0]->getNascCli();
    $cep=$end[0]->getCep();
    $rua=$end[0]->getLogradouro();
    $numero=$end[0]->getNumero();
    $complemento=$end[0]->getComplemento();
    $bairro=$end[0]->getBairro();
    $cidade=$end[0]->getCidade();
    $uf=$end[0]->getUf();



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
                        <li class="breadcrumb-item active" aria-current="page">Método de pagamento</li>
                    </ol>
                </nav>

            </div>
            <div class="col-md-9">

                <div class="card btnCheckout container">
                    <h1 class="mx-3 my-3">Checkout</h1>
                    <div class="container mb-2">
                        <ul class="nav nav-pills ">
                            <li class="disabled text-center ml-auto"><a href="#"><i class="fas fa-map-marker"></i><br>Endereço</a>
                            </li>
                            <li class="disabled checkout1 text-center"><a href="#"><i class="fas fa-truck"></i><br>Método de Entrega</a>
                            </li>
                            <li class="active checkout1 text-center mr-auto"><a href="#"><i class="far fa-money-bill-alt"></i><br>Método de pagamento</a>
                            </li>

                        </ul>
                    </div>
                    <div class="content">
                        <div class="table-responsive card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Produto</th>
                                        <th width="20px">Quantidade</th>
                                        <th>Preço unitário</th>
                                        <th>Desconto</th>
                                        <th colspan="3" class="text-center">Total</th>

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
                                        $valorModeloRaw = $Minicar->getModelo()[0]->getVlrVendaModelo();
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

                                        <td colspan='3' class = 'text-center'>
                                        $totalModelo
                                        </td>

                                        </tr>


                                        ";

                                    }

                                    $totalVenda = "R$ " . number_format($totalVenda, 2, ',', '.');
                                    $_SESSION['TOTAL_VENDA'] = $totalVenda;


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

                    </div>

                    <div class="content">
<!--                         <div class="row">
                         <div class="col-sm-5 ml-5 my-3">
                            <div class="card payment-method">
                                <h4 class="px-3 pt-3">Cartão</h4>
                                <p class="px-3 ">VISA e Mastercard apenas..</p>
                                <div class="card-footer text-center">
                                    <input type="radio" name="payment" value="payment2">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 ml-5 my-3">
                            <div class="card payment-method">
                                <h4 class="px-3 pt-3">Boleto Bancário</h4>
                                <p class="px-3 ">VISA e Mastercard apenas..</p>
                                <div class="card-footer text-center">
                                    <input type="radio" name="payment" value="payment2">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class = "container col-sm-12 mt-5">
                        <h4 class="title text-primary">Pagamento: </h4>
                        <hr>
                        <div class="cartaoCredito text-center mb-5 mt-4">
                            <img src="https://stc.pagseguro.uol.com.br//public/img/payment-methods-flags/68x30/amex.png">
                            <img src="https://stc.pagseguro.uol.com.br//public/img/payment-methods-flags/68x30/mastercard.png">
                            <img src="https://stc.pagseguro.uol.com.br//public/img/payment-methods-flags/68x30/visa.png">
                            <img src="https://stc.pagseguro.uol.com.br//public/img/payment-methods-flags/68x30/diners.png">
                            <img src="https://stc.pagseguro.uol.com.br//public/img/payment-methods-flags/68x30/hipercard.png">
                            <img src="https://stc.pagseguro.uol.com.br//public/img/payment-methods-flags/68x30/sorocred.png">
                        </div>

                        <div class="boleto">

                        </div>
                        <div class="debito">

                        </div>

                        <form  id="formPagSeguro">
                            <input type="hidden" name="tokenCard" id="tokenCard">
                            <input type="hidden" name="hashCard" id="hashCard">
                            <input type="hidden" name="valorParcelas" id="valorParcelas">
                            <input type="hidden" name="frete" id="frete" value="<?php echo $carrinho[0]->getVlrFrete(); ?>">
                            <input type="hidden" name="valorVenda" id="valorVenda" value="<?php echo number_format($totalVendaCarrinho, 2, '.', '');?>">
                            <input type="hidden" name="idCli" id="idCli" value="<?php echo $_SESSION['USERCOM']['ID']?>">


                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Cartao</label>
                                        <input type="text" name="numeroCartao" class="form-control" id="numeroCartao" value="">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="">CVV</label>
                                        <input type="tel" name="cvvCartao" class="form-control" id="cvvCartao" value="">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                       <label for="">Parcelas</label>
                                       <select class="form-control" id="quantidadeParcelas" name="quantidadeParcelas">
                                        <option value="">Selecione...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <label for=""></label>

                                <div class="form-group mt-2 pt-1">
                                 <div class="col-sm-5 text-center" id="bandeiraCartao"></div>
                             </div>
                         </div>

                     </div>

                     <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="nomePagSeguro" class="form-control" id="nomePagSeguro" value="<?php echo $nome;?>" readonly>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="emailPagSeguro" class="form-control" id="emailPagSeguro" value="<?php echo $email;?>" readonly>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                      <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">CPF</label>
                            <input type="text" name="cpfPagSeguro" class="form-control" id="cpfPagSeguro" value="<?php echo $cpf;?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Nascimento</label>
                            <input type="date" name="nascimentoPagSeguro" class="form-control" id="nascimentoPagSeguro" value="<?php echo $nascimento;?>" readonly>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Celular</label>
                            <input type="text" name="celularPagSeguro" class="form-control" id="celularPagSeguro" value="<?php echo $telefone;?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">CEP</label>
                            <input type="text" name="cepPagSeguro" class="form-control" id="cepPagSeguro" value="<?php echo $cep;?>" readonly>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="">Rua</label>
                            <input type="text" name="ruaPagSeguro" class="form-control" id="ruaPagSeguro" value="<?php echo $rua;?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="">Nº</label>
                            <input type="text" name="numeroPagSeguro" class="form-control" id="numeroPagSeguro" value="<?php echo $numero;?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="">Bairro</label>
                            <input type="text" name="bairroPagSeguro" class="form-control" id="bairroPagSeguro" value="<?php echo $bairro;?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="">cidade</label>
                            <input type="text" name="cidadePagSeguro" class="form-control" id="cidadePagSeguro" value="<?php echo $bairro;?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="">UF</label>
                            <input type="text" name="ufPagSeguro" class="form-control" id="ufPagSeguro" value="<?php echo $uf;?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="">Complemento</label>
                            <input type="text" name="complementoPagSeguro" class="form-control" id="complementoPagSeguro" value="<?php echo $complemento;?>" readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">

            <div class="col-12 col-md-6  text-left p-0">
             <a href="checkout2.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Voltar ao método de envio</a>
         </div>
         <div class="col-12 col-md-6  text-right p-0">
            <button type="button" id="comprar" class="btn btn-primary">Finalizar Compra  <i class="fa fa-check"></i>
            </button>
        </div>
    </div>
</div>

</div>

</div>


<div class="col-md-3">

    <?php include_once 'descritivoVenda.php'; ?>


</div>
</div>
</div>
</div>
<?php include_once "inferior.php"; ?>

<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="js/pagSeguro.js"></script>



<!-- 202 - Boleto
102 Mastercard
101 VISA -->