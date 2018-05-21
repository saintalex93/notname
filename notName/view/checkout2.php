<?php include "superior.php";?>

    <div id="content">
        <div class="container">
            <div class="row">

                <div class="col-md-9">

                    <div class="card">
                        <form method="post" action="checkout3.php">
                            <h1>Checkout - Método de entrega</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled" ><a href="#"style="cursor:no-drop;"><i class="fas fa-map-marker"></i><br>Endereço</a>
                                </li>
                                <li class="active"><a href="#"><i class="fas fa-truck"></i><br>Método de Entrega</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="far fa-money-bill-alt"></i><br>Método de pagamento</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fas fa-eye"></i><br>Revisão da encomenda</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card shipping-method">

                                            <h4>Correios</h4>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="entrega" value="entrega1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card shipping-method">

                                            <h4>Transportadora</h4>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="entrega" value="entrega2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card shipping-method">

                                            <h4>Retirar no Local</h4>

                                            <p>Endereço tal</p>

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
