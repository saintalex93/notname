<?php include "superior.php";?>






   

            <div class="container">
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
<style>.teste ul li{
      
        width: 100%;
   
    }
    
   
    
    .teste1 li a{
    
    text-align: left;
    }
    
    </style>
               <div class="col-md-3">

            <div class="card card-default sidebar-menu">

                <div class="card-heading">
                    <h3 class="card-title">Cliente</h3>
                </div>

                <div class="card-body teste">

                    <ul class="nav nav-pills nav-stacked">
                        <li class="teste1 active ">
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

                <div class="col-md-9">
                    <div class="card py-3 px-3 mb-4">
                        <h1>Meus pedidos</h1>

                        <p class="lead">Seus pedidos em um só lugar.</p>
                        <p class="text-muted">Se você tiver alguma dúvida, não hesite em <a href="contato.php">contactar-nos</a>, o nosso centro de atendimento ao cliente está trabalhando para você 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Pedidos</th>
                                        <th>Data</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th># 1735</th>
                                        <td>22/06/2018</td>
                                        <td>R$ 150,00</td>
                                        <td><span class="badge badge-info">Estar preparado</span>
                                        </td>
                                        <td><a href="painelPedidoCliente.php" class="btn btn-primary btn-sm">Visão</a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <th># 1793</th>
                                        <td>22/07/2018</td>
                                        <td>R$ 150,00</td>
                                        <td><span class="badge badge-info">Estar preparado</span>
                                        </td>
                                        <td><a href="painelPedidoCliente.php" class="btn btn-primary btn-sm">Visão</a>
                                        </td>
                                    </tr>
                                 
                                    <tr>
                                        <th># 1829</th>
                                        <td>22/08/2018</td>
                                        <td>R$ 150,00</td>
                                        <td><span class="badge badge-success">	Recebido</span>
                                        </td>
                                        <td><a href="painelPedidoCliente.php" class="btn btn-primary btn-sm">Visão</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th># 1849</th>
                                        <td>22/06/2018</td>
                                        <td>R$ 150,00</td>
                                        <td><span class="badge badge-danger">Cancelado</span>
                                        </td>
                                        <td><a href="painelPedidoCliente.php" class="btn btn-primary btn-sm">Visão</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th># 1863</th>
                                        <td>22/08/2019</td>
                                        <td>R$ 150,00</td>
                                        <td><span class="badge badge-warning">Em espera</span>
                                        </td>
                                        <td><a href="painelPedidoCliente.php" class="btn btn-primary btn-sm">Visão</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

         
                </div></div>








<?php include "inferior.php";?>