<?php 
include "superior.php";
include_once "dal/ProdutoDAL.php";

$codProduto = $_REQUEST['id'];

if(!isset($_REQUEST['id'])){
    echo "<script>window.location.href='index.php'</script>";
}
else{
    $produto = ProdutoDAL::buscaProduto($codProduto);
    
    var_dump($produto[0]->getDescProd());
    
  
}
?>





<div id="content">
    <div class="container mb-4">

        <div class="col-md-12 my-3">


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>

                    <li class="breadcrumb-item " aria-current="page">Mulher</li>


                    <li class="breadcrumb-item " aria-current="page">Blusa</li>
                    <li class="breadcrumb-item active" aria-current="page">Nome do produto</li>

                </ol>
            </nav>

        </div>
        <div class="row">
            <?php include "menuCategoria.php";?>






            <div class="col-md-9">

                <div class="row " id="productMain">
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <img class="card-img-top" src="assets/produtos/versoProduto1.jpg" alt="">

                        </div>
                    </div>



                    <div class="col-sm-6">

<<<<<<< HEAD
                            <div class="col-sm-12 col-md-12 mb-3 d-flex flex-row flex-column">
                                <div class="card ">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            <?php echo $produto[0]->getDescProd();?>
=======
                        <div class="col-sm-12 col-md-12 mb-3 d-flex flex-row flex-column">
                            <div class="card ">
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                        Nome do produto
>>>>>>> 0115dc7dc291768ff223fcf7f4cc189e6e1b025c

                                    </h4>
                                    <p class="card-text goToDescription"><a href="#details" class="scroll-to">Role para detalhes do produto, material e cuidado e dimensionamento</a>
                                    </p>
                                    <p class="price">$124.00</p>
                                    <p class="buttons">
                                        <a href="" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add ao carrinho</a>
                                        <a href="" class="btn btn-default"><i class="fa fa-heart"></i> Add a lista de desejo</a>
                                    </p>


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <img class="card-img-top" src="assets/produtos/frenteProduto3.jpg" alt="">

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="card ">
                                    <img class="card-img-top" src="assets/produtos/versoProduto2.jpg" alt="">

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="card ">
                                    <img class="card-img-top" src="assets/produtos/frenteProduto1.jpg" alt="">

                                </div>
                            </div>

                        </div>


<<<<<<< HEAD
                    <div class="card container">
                        <p>
                            <h4>Detalhes do produto</h4>
                            <p><?php echo $produto[0]->getDescCompletaProd();?></p>
                            <h4>Material e cuidados</h4>
                            <ul>
                                <li>Poliéster</li>
                                <li>Máquina de lavar</li>
                            </ul>
                            <h4>Tamanho e ajuste</h4>
                            <ul>
                                <li>Tamanho normal</li>
                                <li>O modelo (altura 5'8 "e peito 33") está usando um tamanho GG</li>
                            </ul>

                            <blockquote>
                                <p><em>Defina o estilo nesta temporada com a nova gama de topos da Armani, trabalhada com detalhes intrincados. Criar um olhar chique declaração unindo este número de renda com jeans skinny e bombas.</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Mostre para seus amigos</h4>
                                <p>
                                    <a href="#" class="facebook" data-animate-hover="pulse"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="instagram" data-animate-hover="pulse"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="gplus" data-animate-hover="pulse"><i class="fab fa-google-plus-g"></i></a>
                                    <a href="#" class="twitter" data-animate-hover="pulse"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fas fa-envelope"></i></a>
                                </p>
                            </div>
=======
>>>>>>> 0115dc7dc291768ff223fcf7f4cc189e6e1b025c
                    </div>
                </div>


                <div class="card">
                    <p>
                        <h4>Detalhes do produto</h4>
                        <p>Top de renda branca, tecido, tem um pescoço redondo, mangas curtas, tem forro de malha anexado</p>
                        <h4>Material e cuidados</h4>
                        <ul>
                            <li>Poliéster</li>
                            <li>Máquina de lavar</li>
                        </ul>
                        <h4>Tamanho e ajuste</h4>
                        <ul>
                            <li>Tamanho normal</li>
                            <li>O modelo (altura 5'8 "e peito 33") está usando um tamanho GG</li>
                        </ul>

                        <blockquote>
                            <p><em>Defina o estilo nesta temporada com a nova gama de topos da Armani, trabalhada com detalhes intrincados. Criar um olhar chique declaração unindo este número de renda com jeans skinny e bombas.</em>
                            </p>
                        </blockquote>

                        <hr>
                        <div class="social">
                            <h4>Mostre para seus amigos</h4>
                            <p>
                                <a href="#" class="facebook" data-animate-hover="pulse"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="instagram" data-animate-hover="pulse"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="gplus" data-animate-hover="pulse"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="twitter" data-animate-hover="pulse"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fas fa-envelope"></i></a>
                            </p>
                        </div>
                </div>

                <div class="row same-height-row my-4">

                    <div class="col-md-3 col-sm-6  d-flex flex-row">
                        <div class="card">

                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Você também pode gostar destes produtos </h4>


                            </div>
                        </div>
                    </div>


                     <div class="col-md-3 col-sm-6 text-center">

                        <div class="card card-container ">
                            <div class="card-flip">
                                <div class="card front">
                                    <div class="card-block imgP">
                                        <img class="card-img-top" src="img/Produtos/Produto1.jpg" alt="Foto da Capa do Modelo">
                                    </div>
                                </div>
                                <div class="card back ">
                                    <div class="card-block imgP">
                                        <img class="card-img-top " src="img/Produtos/Produto2.jpg" alt="Foto do Modelo">
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Produto 6</h4>
                            <p class="card-text">R$111,00</p>
                            <p class="buttons">
                                <a href="" class="btn btn-default">Ver detalhes</a>
                            </p>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>

                        </div>
                    </div>

                     <div class="col-md-3 col-sm-6 text-center">

                        <div class="card card-container ">
                            <div class="card-flip">
                                <div class="card front">
                                    <div class="card-block imgP">
                                        <img class="card-img-top" src="img/Produtos/Produto1.jpg" alt="Foto da Capa do Modelo">
                                    </div>
                                </div>
                                <div class="card back">
                                    <div class="card-block imgP">
                                        <img class="card-img-top " src="img/Produtos/Produto2.jpg" alt="Foto do Modelo">
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Produto 6</h4>
                            <p class="card-text">R$111,00</p>
                            <p class="buttons">
                                <a href="" class="btn btn-default">Ver detalhes</a>
                            </p>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>

                        </div>
                    </div>


                     <div class="col-md-3 col-sm-6 text-center">

                        <div class="card card-container ">
                            <div class="card-flip">
                                <div class="card front">
                                    <div class="card-block imgP">
                                        <img class="card-img-top" src="img/Produtos/Produto1.jpg" alt="Foto da Capa do Modelo">
                                    </div>
                                </div>
                                <div class="card back">
                                    <div class="card-block imgP">
                                        <img class="card-img-top " src="img/Produtos/Produto2.jpg" alt="Foto do Modelo">
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Produto 6</h4>
                            <p class="card-text">R$111,00</p>
                            <p class="buttons">
                                <a href="" class="btn btn-default">Ver detalhes</a>
                            </p>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6 d-flex flex-row">
                        <div class="card">

                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Produtos vistos recentemente</h4>


                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6 text-center">

                        <div class="card card-container ">
                            <div class="card-flip">
                                <div class="card front">
                                    <div class="card-block imgP">
                                        <img class="card-img-top" src="img/Produtos/Produto1.jpg" alt="Foto da Capa do Modelo">
                                    </div>
                                </div>
                                <div class="card back">
                                    <div class="card-block imgP">
                                        <img class="card-img-top " src="img/Produtos/Produto2.jpg" alt="Foto do Modelo">
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Produto 6</h4>
                            <p class="card-text">R$111,00</p>
                            <p class="buttons">
                                <a href="" class="btn btn-default">Ver detalhes</a>
                            </p>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 text-center">

                        <div class="card card-container ">
                            <div class="card-flip">
                                <div class="card front">
                                    <div class="card-block imgP">
                                        <img class="card-img-top" src="img/Produtos/Produto1.jpg" alt="Foto da Capa do Modelo">
                                    </div>
                                </div>
                                <div class="card back">
                                    <div class="card-block imgP">
                                        <img class="card-img-top " src="img/Produtos/Produto2.jpg" alt="Foto do Modelo">
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Produto 6</h4>
                            <p class="card-text">R$111,00</p>
                            <p class="buttons">
                                <a href="" class="btn btn-default">Ver detalhes</a>
                            </p>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6 text-center">

                        <div class="card card-container ">
                            <div class="card-flip">
                                <div class="card front">
                                    <div class="card-block imgP">
                                        <img class="card-img-top" src="img/Produtos/Produto1.jpg" alt="Foto da Capa do Modelo">
                                    </div>
                                </div>
                                <div class="card back">
                                    <div class="card-block imgP">
                                        <img class="card-img-top " src="img/Produtos/Produto2.jpg" alt="Foto do Modelo">
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Produto 6</h4>
                            <p class="card-text">R$111,00</p>
                            <p class="buttons">
                                <a href="" class="btn btn-default">Ver detalhes</a>
                            </p>
                            <div class="fitaTagProduto promocaoTag">
                                <div class="fitaTag">Promoção</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>
                            <div class="fitaTagProduto novo">
                                <div class="fitaTag">Novo</div>
                                <div class="fitaTagProduto-background"></div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>








        </div>
    </div>





</div>

<?php include_once "inferior.php";?>
