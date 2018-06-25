<?php include "superior.php";?>


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
                        <form method="post" action="checkout4.php">
                            <h1 class="mx-3 my-3">Checkout - método de pagamento</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled  text-center"><a href="#"><i class="fas fa-map-marker"></i><br>Endereço</a>
                                </li>
                                <li class="disabled checkout1 text-center"><a href="#"><i class="fas fa-truck"></i><br>Método de Entrega</a>
                                </li>
                                <li class="active checkout1 text-center"><a href="#"><i class="far fa-money-bill-alt"></i><br>Método de pagamento</a>
                                </li>
                                <li class="disabled checkout1 text-center"><a href="#"style="cursor:no-drop;"><i class="fas fa-eye"></i><br>Revisão da encomenda</a>
                                </li>
                            </ul>
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-5 ml-5 my-3">
                                        <div class="card payment-method">

                                            <h4 class="px-3 pt-3">Paypal</h4>

                                            <p class="px-3 ">Lorem ipsum dolor sit amet.</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="payment" value="payment1">
                                            </div>
                                        </div>
                                    </div>
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

                                            <h4 class="px-3 pt-3">Pagseguro</h4>

                                            <p class="px-3 ">Lorem ipsum dolor sit amet.</p>

                                            <div class="card-footer text-center">

                                                <input type="radio" name="payment" value="payment3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 ml-5 my-3">
                                        <div class="card payment-method">

                                            <h4 class="px-3 pt-3">Dinheiro na entrega</h4>

                                            <p class="px-3 ">Você paga quando você consegue.</p>

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

                <?php include_once 'descritivoVenda.php'; ?>


                </div>
            </div>
        </div>
    </div>
    <?php include_once "inferior.php";?>
