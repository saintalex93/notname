<?php include "superior.php"; ?>

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
