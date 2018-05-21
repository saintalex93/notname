<?php include "superior.php";?>


    <div id="content">
        <div class="container">
            <div class="row">

                <div class="col-md-9">

                    <div class="card">
                        <form method="post" action="checkout4.php">
                            <h1>Checkout - método de pagamento</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled"><a href="#"><i class="fas fa-map-marker"></i><br>Endereço</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fas fa-truck"></i><br>Método de Entrega</a>
                                </li>
                                <li class="active"><a href="#"><i class="far fa-money-bill-alt"></i><br>Método de pagamento</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fas fa-eye"></i><br>Revisão da encomenda</a>
                                </li>
                            </ul>
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card payment-method">

                                            <h4>Paypal</h4>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="payment" value="payment1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card payment-method">

                                            <h4>Cartão</h4>

                                            <p>VISA e Mastercard apenas..</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="payment" value="payment2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card payment-method">

                                            <h4>Pagseguro</h4>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="payment" value="payment3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card payment-method">

                                            <h4>Dinheiro na entrega</h4>

                                            <p>Você paga quando você consegue.</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="payment" value="payment3">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="pull-left">
                                    <a href="checkout2.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Voltar ao método de envio</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continuar com a revisão do pedido<i class="fa fa-chevron-right"></i>
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
