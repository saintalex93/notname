<?php include "superior.php";?>






 <div id="content">

    <div class="container">
<div class="col-md-12 my-3">


                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
                        </ol>
                    </nav>

                </div>
        <div class="row">
            <div class="col-md-9">

                <div class="card ">

                    <form method="post" action="#" class="mx-3">

                        <h1 class="">Carrinho de compras</h1>
                        <p>Você tem atualmente 3 item (s) no seu carrinho.</p>
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Produto</th>
                                        <th>Quantidade</th>
                                        <th>Preço unitário</th>
                                        <th>Desconto</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="produto.php">
                                                    <img class="imgPequena" src="assets/produtos/frenteProduto1.jpg" alt="">
                                                </a>
                                        </td>
                                        <td><a href="#">Produto 1</a>
                                        </td>
                                        <td>
                                            <input type="number" value="2" class="form-control">
                                        </td>
                                        <td>R$123.00</td>
                                        <td>R$0.00</td>
                                        <td>R$246.00</td>
                                        <td><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="produto.php">
                                                    <img class="imgPequena" src="assets/produtos/versoProduto2.jpg" alt="Black Blouse Armani">
                                                </a>
                                        </td>
                                        <td><a href="produto.php">Produto 2</a>
                                        </td>
                                        <td>
                                            <input type="number" value="1" class="form-control">
                                        </td>
                                        <td>R$200.00</td>
                                        <td>R$0.00</td>
                                        <td>R$200.00</td>
                                        <td><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">R$446.00</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                   

                        <div class="card-footer">
                           
                            <div class="float-left pull-left col-6">
                                <a href="categoria.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue comprando</a>
                            </div>
                            
                            <div class="float-right pull-right col-6" style="padding:0px 0 20px 0 ">                             
                                <button class="btn btn-default"><i class="fas fa-sync-alt"></i>  Atualizar cesta</button>
                                <button type="submit" class="btn btn-primary">Fazer o check-out <i class="fas fa-chevron-right"></i></button>
                            </div>
                            
                        </div>

                    </form>

                </div>
            


                <div class="row same-height-row my-4 ">

                    <div class="col-md-3 col-sm-6  d-flex flex-row">
                        <div class="card">

                            <div class="card-body text-center ">
                                <h4 class="card-title my-5">
                                    Você também pode gostar destes produtos </h4>
                            </div>
                        </div>
                    </div>


                     <div class='col-md-3 col-sm-6 mb-3 card-container'>
                        <div class='card'>
                            <a href="produto.php">
                            <div class='card-flip imgP'>
                                <div class='card front'>
                                    <div class='card-block'>
                                        <img class='card-img-top' src='img/Produtos/Produto1.jpg' alt='Foto da Capa do Modelo'>
                                    </div>
                                </div>
                                <div class='card back'>
                                    <div class='card-block'>
                                        <img class='card-img-top ' src='img/Produtos/Produto2.jpg' alt='Foto do Modelo'>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <div class="card-body text-center">
                                <h4 class="card-title">Amarola</h4>
                                <p class="card-text price"><del>R$200</del> R$199,99</p>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-3 col-sm-6 mb-3 card-container'>
                        <div class='card'>
                            <a href="produto.php">
                            <div class='card-flip imgP'>
                                <div class='card front'>
                                    <div class='card-block'>
                                        <img class='card-img-top' src='img/Produtos/Produto1.jpg' alt='Foto da Capa do Modelo'>
                                    </div>
                                </div>
                                <div class='card back'>
                                    <div class='card-block'>
                                        <img class='card-img-top ' src='img/Produtos/Produto2.jpg' alt='Foto do Modelo'>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <div class="card-body text-center">
                                <h4 class="card-title">Amarola</h4>
                                <p class="card-text price"><del>R$200</del> R$199,99</p>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                        </div>
                    </div>


                     <div class='col-md-3 col-sm-6 mb-3 card-container'>
                        <div class='card'>
                            <a href="produto.php">
                            <div class='card-flip imgP'>
                                <div class='card front'>
                                    <div class='card-block'>
                                        <img class='card-img-top' src='img/Produtos/Produto1.jpg' alt='Foto da Capa do Modelo'>
                                    </div>
                                </div>
                                <div class='card back'>
                                    <div class='card-block'>
                                        <img class='card-img-top ' src='img/Produtos/Produto2.jpg' alt='Foto do Modelo'>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <div class="card-body text-center">
                                <h4 class="card-title">Amarola</h4>
                                <p class="card-text price"><del>R$200</del> R$199,99</p>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
       
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mx-3">Resumo do pedido</h3>
                    </div>
                    <p class="text-muted text-center">Envio e custos adicionais são calculados com base nos valores que você inseriu.</p>

                    <div class="table-responsive ">
                        <table class="table text-center">
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


                <div class="card my-4">
                    <div class="card-header">
                        <h4>Código do cupom</h4>
                    </div>
                    <p class="text-muted mb-3 text-center">Se você tiver um código de cupom, insira-o na caixa abaixo.</p>
                    <form>
                        <div class="input-group mb-3">

                            <input type="text" class="form-control ml-3">

                            <span class="input-group-btn">

					<button class="btn btn-primary mr-3 " type="button"><i class="fas fa-gift"></i></button>

				    </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include_once "inferior.php";?>

