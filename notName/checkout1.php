<?php include "superior.php";
include_once "model/Cliente.php";
include_once "dal/ClienteDAL.php";
include_once "model/Endereco.php";
include_once "dal/EnderecoDAL.php";

if (isset($_SESSION['USERCOM']['ID'])) {

    $cliente = new Cliente();
    $endereco = new Endereco();
    $cliente->setIdCli($_SESSION['USERCOM']['ID']);
    $endereco->setIdCli($_SESSION['USERCOM']['ID']);

    $cli = ClienteDAL::buscaCliente($cliente);
    $end = EnderecoDAL::buscaEndereco($endereco);

    if ($end) {

        $idEnd = $end[0]->getId();
        $cep = $end[0]->getCep();
        $logradouro = $end[0]->getLogradouro();
        $cidade = $end[0]->getCidade();
        $bairro = $end[0]->getBairro();
        $numero = $end[0]->getNumero();
        $complemento = $end[0]->getComplemento();
        $tipoEnd = $end[0]->getTipo();
        $uf = $end[0]->getId();

        var_dump($end);

    } else {
        $idEnd = 0;
        $cep = "";
        $logradouro = "";
        $cidade = "";
        $bairro = "";
        $numero = "";
        $complemento = "";
        $tipoEnd = "";
        $uf = "";
    }

} else {
    echo "
            <script>
                window.location.href = 'index.php';
            </script>
        ";
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
                            <li class="breadcrumb-item active" aria-current="page">Endereço</li>
                        </ol>
                    </nav>

                </div>

            <div class="col-md-9">

                <div class="card btnCheckout ">
                        <h1 class="mx-3 my-3">Checkout</h1>
                        <ul class="nav nav-pills nav-justified ajusteCentro">
                            <li class="active text-center"><a href="#"><i class="fas fa-map-marker"></i><br>Endereço</a>
                            </li>
                            <li class="disabled checkout1 text-center"><a href="#" style="cursor:no-drop;"><i class="fas fa-truck"></i><br>Método de Entrega</a>
                            </li>
                            <li class="disabled checkout1 text-center"><a href="#"style="cursor:no-drop;"><i class="far fa-money-bill-alt"></i><br>Método de pagamento</a>
                            </li>
                            <li class="disabled checkout1 text-center"><a href="#"style="cursor:no-drop;"><i class="fas fa-eye"></i><br>Revisão da encomenda</a>
                            </li>
                        </ul>
    <form action=""  id = "formCliEnd">
<input type="hidden" name="idCli" value="<?php echo $cli[0]->getIdCli(); ?>">
<input type="hidden" name="idEnd" value="<?php echo $idEnd; ?>">

                        <div class="content mx-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nome</label>
                                        <input type="text" name="nomeCli" class="form-control" id="primeiroNome" value="<?php echo $cli[0]->getNomeCli(); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="emailCli" class="form-control" id="segundoNome" value="<?php echo $cli[0]->getEmailCli(); ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">CPF</label>
                                        <input type="tel" name="cpfCli" class="form-control" id="cpf" value="<?php echo $cli[0]->getCpfCli(); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">RG</label>
                                        <input type="text" name="rgCli" class="form-control" id="rg" value="<?php echo $cli[0]->getRgCli(); ?>">
                                    </div>
                                </div>
                            </div>

                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label for="">Gênero</label>
                                       <select class="form-control" id="generoCli" name="generoCli">
                                                <option value="">Selecione...</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                         <label for="">Nascimento</label>
                                        <input type="date" class="form-control" name="nasCli" value="<?php echo $cli[0]->getNascCli(); ?>">
                                    </div>
                                </div>
                            </div>

                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Telefone</label>
                                        <input type="text" class="form-control" name="telCli" id="telefone" value="<?php echo $cli[0]->gettelResiCli(); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" class="form-control" name="celCli" id="celular" value="<?php echo $cli[0]->getTelCelCli(); ?>">
                                    </div>
                                </div>
                            </div>


                            <h4 class = "mt-2 text-primary">Dados de Entrega:</h4>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Cep</label>
                                      <input type="text" name="cepEnd" id="cep" class="form-control" onkeyup ="if (this.value.length == 10) fnCep(this.value)" value = "<?php echo $cep; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="">Endereço</label>
                                        <input type="text" name="endEnd" class="form-control" id="txtEndereco" value = "<?php echo $logradouro; ?>">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="">Nº</label>
                                        <input type="text" name="nEnd" class="form-control" id="txtNumero" value = "<?php echo $numero; ?>">
                                    </div>
                                </div>



                            </div> <!-- -->
 <div class="row">

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="">Cidade</label>
                                      <input type="text" name="cidadeEnd" id="txtCidade" class="form-control" value = "<?php echo $cidade; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="">Bairro</label>
                                        <input type="text" name ="bairroEnd" class="form-control" id="txtBairro" value = "<?php echo $bairro; ?>">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="">UF</label>
                                       <select class="form-control" id="cmbUf" name="ufEnd">
                                                <option value="">Selecione</option>
                                                <option value ='SP'>SP</option>
                                                <option value ='RJ'>RJ</option>
                                                <option value ='MG'>MG</option>
                                                <option value ='PR'>PR</option>
                                                <option value ='AC'>AC</option>
                                                <option value ='AL'>AL</option>
                                                <option value ='AP'>AP</option>
                                                <option value ='AM'>AM</option>
                                                <option value ='BA'>BA</option>
                                                <option value ='CE'>CE</option>
                                                <option value ='DF'>DF</option>
                                                <option value ='ES'>ES</option>
                                                <option value ='GO'>GO</option>
                                                <option value ='MA'>MA</option>
                                                <option value ='MT'>MT</option>
                                                <option value ='MS'>MS</option>
                                                <option value ='PA'>PA</option>
                                                <option value ='PB'>PB</option>
                                                <option value ='PE'>PE</option>
                                                <option value ='PI'>PI</option>
                                                <option value ='RN'>RN</option>
                                                <option value ='RS'>RS</option>
                                                <option value ='RO'>RO</option>
                                                <option value ='RR'>RR</option>
                                                <option value ='SC'>SC</option>
                                                <option value ='SE'>SE</option>
                                                <option value ='TO'>TO</option>
                                            </select>
                                    </div>
                                </div>



                            </div> <!-- -->

                             <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="">Complemento</label>
                                      <input type="text" name="compEnd"  class="form-control" value = "<?php echo $complemento; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Tipo</label>
                                        <input type="text" name = "tipoEnd" class="form-control" placeholder="Casa" value = "<?php echo $tipoEnd; ?>">
                                    </div>
                                </div>

                            </div> <!-- -->

</form>
                        </div>



                        <div class="card-footer">
                            <div class="pull-left">
                                <a href="carrinho.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Voltar ao carrinho</a>
                            </div>
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary" id="btnCliEnd">Continuar para o método de entrega<i class="fa fa-chevron-right"></i>
                                    </button>
                            </div>
                        </div>
                </div>



            </div>
            <div class="col-md-3">

                <?php include_once 'descritivoVenda.php';?>

            </div>
        </div>
        </div>
    </div>

    <?php include_once "inferior.php";?>

    <script src="js/mask.js"></script>
    <script src="js/checkout1.js"></script>


<?php
$genero = $cli[0]->getGeneroCli();
echo "<script>
$('#generoCli').val('$genero');
$('#cmbUf').val('$uf');



</script>";

?>
