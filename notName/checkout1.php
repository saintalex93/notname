<?php include "superior.php";
include_once "model/Cliente.php";
include_once "dal/ClienteDAL.php";


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
                    <form method="post" action="checkout2.php" class="">
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

                        <div class="content mx-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nome</label>
                                        <input type="text" class="form-control" id="primeiroNome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" id="segundoNome">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">CPF</label>
                                        <input type="tel" class="form-control" id="cpf">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">RG</label>
                                        <input type="text" class="form-control" id="rg">
                                    </div>
                                </div>
                            </div>

                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label for="">Gênero</label>
                                       <select class="form-control" id="">
                                                <option value="">..</option>
                                                <option value="">São Paulo</option>
                                                <option value="">Rio de Janeiro</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                         <label for="">Nascimento</label>
                                        <input type="date" class="form-control" id="">
                                    </div>
                                </div>
                            </div>

                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Telefone</label>
                                        <input type="text" class="form-control" id="telefone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" class="form-control" id="celular">
                                    </div>
                                </div>
                            </div>
<label for="">Dados de entrega</label>
<hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Cep</label>
                                      <input type="text" name="" id="cep" class="form-control" onkeyup ="if (this.value.length == 10) fnCep(this.value)">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="">Endereço</label>
                                        <input type="text" class="form-control" id="txtEndereco">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="">Nº</label>
                                        <input type="text" class="form-control" id="txtNumero">
                                    </div>
                                </div>



                            </div> <!-- -->
 <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="">Cidade</label>
                                      <input type="text" name="" id="txtCidade" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="">Bairro</label>
                                        <input type="text" class="form-control" id="txtBairro">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="">UF</label>
                                       <select class="form-control" id="cmbUf">
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
                                      <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Tipo</label>
                                        <input type="text" class="form-control" id="" placeholder="Casa">
                                    </div>
                                </div>

                            </div> <!-- -->
                            

                        </div>

                        

                        <div class="card-footer">
                            <div class="pull-left">
                                <a href="carrinho.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Voltar ao carrinho</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Continuar para o método de entrega<i class="fa fa-chevron-right"></i>
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

    <script src="js/mask.js"></script>
    <script src="js/checkout1.js"></script>

