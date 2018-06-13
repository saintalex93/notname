<?php include "superior.php";?>


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
                                        <label for="">Primeiro nome</label>
                                        <input type="text" class="form-control" id="primeiroNome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Último nome</label>
                                        <input type="text" class="form-control" id="segundoNome">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Texto</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Rua</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">Texto</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">Texto</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <select class="form-control" id="">
                                                <option value="">..</option>
                                                <option value="">São Paulo</option>
                                                <option value="">Rio de Janeiro</option>
                                                
                                                
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">Pais</label>
                                        <select class="form-control" id="">
                                                
                                                
                                                
                                            </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Telefone</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                </div>

                            </div>

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

                <div class="card">
                    <div class="card-header">
                        <h3>Resumo do pedido</h3>
                    </div>
                    <p class="text-muted">Envio e custos adicionais são calculados com base nos valores que você inseriu.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Subtotal do pedido</td>
                                    <th>R$446.00</th>
                                </tr>
                                <tr>
                                    <td>Envio e manipulação</td>
                                    <th>R$10.00</th>
                                </tr>
                                <tr>
                                    <td>Imposto</td>
                                    <th>R$0.00</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>R$456.00</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </div>

    <?php include_once "inferior.php";?>
