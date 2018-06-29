<?php include "superior.php";
require_once "./dal/ClienteDAL.php";
require_once "./dal/EnderecoDAL.php";

$idEnd = new Endereco();
$idCli = new Cliente();

$idEnd->setIdCli($id);
$idCli->setIdCli($id);

$cliente = ClienteDAL::buscaCliente($idCli);
$endereco = EnderecoDAL::buscaEndereco($idEnd);


if ($endereco) {

    $idEnd = $endereco[0]->getId();
    $cep = $endereco[0]->getCep();
    $logradouro = $endereco[0]->getLogradouro();
    $cidade = $endereco[0]->getCidade();
    $bairro = $endereco[0]->getBairro();
    $numero = $endereco[0]->getNumero();
    $complemento = $endereco[0]->getComplemento();
    $tipoEnd = $endereco[0]->getTipo();
    $uf = $endereco[0]->getUf();

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
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Minha Conta</li>
                </ol>
            </nav>

        </div>


        <div class="col-md-3">

            <div class="card card-default sidebar-menu">

                <div class="card-heading">
                    <h3 class="card-title">Cliente</h3>
                </div>
                <style>
                .teste ul li{

                    width: 100%;
                }

            </style>
            <div class="card-body teste">

                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="painelCliente.php"><i class="fa fa-heart"></i> Meus pedidos</a>
                    </li>
                    <li  class="active">
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

            <h3>Dados Pessoais</h3>
            <form id="forDadosClie">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="hidden" name="txtIdCli" value="<?php echo $id;?>">
                            <label for="">Nome</label>
                            <input type="text" class="form-control" id="txtNomeCli" name="txtNomeCli" maxlength="70" value="<?php
                            echo $cliente[0]->getNomeCli();
                            ?>">
                        </div>
                    </div>

                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">RG</label>
                            <input type="text" class="form-control" id="txtRgCli" name="txtRgCli" maxlength="15" value="<?php
                            echo $cliente[0]->getRgCli();
                            ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="endereco">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php
                            echo $cliente[0]->getCpfCli();
                            ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="endereco">Genero</label>
                            <select class="form-control" id="cmbGen" name="cmbGen">
                                <option value="0">Selecione</option>
                                <option value ='F'>Feminino</option>
                                <option value ='M'>Masculino</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php
                            echo $cliente[0]->getNascCli();
                            ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="">Telefone Fixo</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php
                            echo $cliente[0]->getTelResiCli();
                            ?>">

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="">Telefone Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" value="<?php
                            echo $cliente[0]->getTelCelCli();
                            ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="">Telefone Comercial</label>
                            <input type="text" class="form-control" id="comercial" name="comercial" value="<?php
                            echo $cliente[0]->getTelComCli();
                            ?>">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php
                            echo $cliente[0]->getEmailCli();
                            ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="button" class="btn btn-primary" id="btnAlteraDadosCliente" name="btnAlteraDadosCliente"><i class="fa fa-save"></i> Salvar alterações</button>

                    </div>

                    <div class="col-sm-12 text-center">
                        <label id="lblReturnCadCli"></label>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-9 offset-md-3">
        <div class="card py-3 px-3 mb-4">
            <h3>Endereço</h3>
            <form id="formEndCli">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="hidden" name="txtIdCliEnd" value="<?php echo $id;?>">
                            <input type="hidden" name="txtIdEnd" value="
                            <?php
                            if($idEnd == 0){

                                echo 0;
                            }else{

                                echo $idEnd;
                            }                           
                            
                            ?>
                            ">
                            <label for="">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" onkeyup ="if (this.value.length == 10) fnCep(this.value)"maxlength="12" value="<?php
                            echo $cep;
                            ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="">Logradouro</label>
                            <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" value="<?php
                            echo $logradouro;
                            ?>">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="">Numero</label>
                            <input type="text" class="form-control" id="txtNumero" name="txtNumero" value="<?php
                            echo $numero;
                            ?>">
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="">Bairro</label>
                            <input type="text" class="form-control" id="txtBairro" name="txtBairro" value="<?php
                            echo $bairro;
                            ?>">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="endereco">Cidade</label>
                            <input type="text" class="form-control" id="txtCidade" name="txtCidade" value="<?php
                            echo $cidade;
                            ?>">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="endereco">UF</label>
                            <select class="form-control" id="cmbUf" name="cmbUf">
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
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">
                            <label for="">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $complemento;?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="">Tipo de Endereço</label>
                            <select class="form-control" id="tipoEnd" name="tipoEnd">
                                <option value="">Selecione</option>
                                <option value ='casa'>Casa</option>
                                <option value ='apartamento'>Apartamento</option>
                                <option value ='sobrado'>Sobrado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="button" class="btn btn-primary" id="btnAlteraEndCliente" name="btnAlteraEndCliente"><i class="fa fa-save"></i> Salvar alterações</button>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <label id="lblReturnEndCli"></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-9 offset-md-3">
        <div class="card py-3 px-3 mb-4">
            <h3 class = "text-center">Alterar senha</h3>

            <form id="formSenhaCli">

                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <input type="hidden" name="txtIdCliSenha" value="<?php echo $id;?>">
                            <label for="novaSenha">Nova Senha</label>
                            <input type="password" class="form-control" id="novaSenha" name="novaSenha" value="<?php
                            echo $cliente[0]->getSenhaCli();
                            ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <label for="senhaNova">Confirme a Nova Senha</label>
                            <input type="password" class="form-control" id="senhaNova" name="senhaNova" value="<?php
                            echo $cliente[0]->getSenhaCli();
                            ?>">
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-sm-12 text-center">
                    <button type="button" class="btn btn-primary" id="btnAlteraSenhaCliente" name="btnAlteraSenhaCliente"><i class="fa fa-save"></i> Salvar senha</button>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <label id="lblReturnSenhaCli"></label>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>
</div>

<?php include "inferior.php";
echo "<script>document.getElementById('cmbGen').value = '" . $cliente[0]->getGeneroCli() . "';</script>";
echo "<script>document.getElementById('cmbUf').value = '" . $uf. "';
document.getElementById('tipoEnd').value = '" . $tipoEnd . "';
</script>";


?>
<script src="js/mask.js"></script>
<script src="js/checkout1.js"></script>
<script src="./js/ajaxPainelCliente.js"></script>

