<?php include "superior.php";?>



    <div class="container">
<div class="row">
        <div class="col-md-12 my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Carrinho</a></li>
                    <li class="breadcrumb-item active" aria-current="page">#1735</li>
                </ol>
            </nav>

        </div>
<style>.teste ul li{
      
        width: 100%;
    }</style>
        <div class="col-md-3">

            <div class="card card-default sidebar-menu">

                <div class="card-heading">
                    <h3 class="card-title">Cliente</h3>
                </div>

                <div class="card-body teste">

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="painelCliente.php"><i class="fa fa-heart"></i> Meus pedidos</a>
                        </li>
                        <li>
                            <a href="painelContaCliente.php"><i class="fas fa-user"></i> Minha conta</a>
                        </li>

                        <li>
                            <a href="index.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="col-md-9" >
            <div class="card py-3 px-3 mb-4">
                <h1>Pedido #1735</h1>

                <p class="lead">A Encomenda #1735 foi colocada a <strong>22/06/2018</strong> e está atualmente a <strong>ser preparada</strong>.</p>
                <p class="text-muted">Se você tiver alguma dúvida, não hesite em <a href="contato.php">contactar-nos</a>, o nosso centro de atendimento ao cliente está trabalhando para você 24/7.</p>

                <hr>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Produto</th>
                                <th>Quantidade</th>
                                <th>Preço unitario</th>
                                <th>Desconto</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#">
                                                <img src="" alt="">
                                            </a>
                                </td>
                                <td><a href="#">Camisa</a>
                                </td>
                                <td>2</td>
                                <td>R$123,00</td>
                                <td>R$0,00</td>
                                <td>R$246,00</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">
                                                <img src="" alt="">
                                            </a>
                                </td>
                                <td><a href="#">Camisa</a>
                                </td>
                                <td>2</td>
                                <td>R$123,00</td>
                                <td>R$0,00</td>
                                <td>R$246,00</td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-right">Subtotal do pedido</th>
                                <th>$446.00</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">Total</th>
                                <th>$446.00</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
              

                <div class="row addresses">
                    <div class="col-md-6">
                        <h2>Endereço de fatura</h2>
                        <p>Rua tal nº666
                            <br>00000-000
                            <br>São Paulo
                    </div>
                    <div class="col-md-6">
                        <h2>Endereço de entrega</h2>
                        <p>Rua tal nº666
                            <br>00000-000
                            <br>São Paulo
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include "inferior.php";?>
