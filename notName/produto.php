<?php 
include "superior.php";
include_once "dal/ProdutoDAL.php";

$codProduto = $_REQUEST['id'];

if(!isset($_REQUEST['id'])){
    echo "<script>window.location.href='index.php'</script>";
}
else{
    $produto = ProdutoDAL::buscaProduto($codProduto);
    
}

$modelo = $produto[0]->getModelo();

$arrModelo = array();

echo "<pre>";



// print_r($modelo[0]->getIdModelo());




// echo $modelo[array_search(2, array_column($modelo, ))];

print_r($modelo[array_search(2, array_column($modelo, 'ID'))]->getIdModelo());



// foreach ($modelo as $m) {



//     if ($m->getIdModelo() == $_REQUEST['md']) {

//         $arrModelo[] = array("ID" => $m->getIdModelo(), "NOME_MODELO" => $m->getNomeModelo(), "VALOR_MODELO" => $m->getVlrVendaModelo(), "ID_COR" => $m->getCormodelo(), "DESC_COR" => $m->getDescCor(), "ID_TAMANHO" => $m->getDescTamanho());
//     }

//     $arrModelo[] = array("ID" => $m->getIdModelo(), "NOME_MODELO" => $m->getNomeModelo(), "VALOR_MODELO" => $m->getVlrVendaModelo(), "ID_COR" => $m->getCormodelo(), "DESC_COR" => $m->getDescCor(), "ID_TAMANHO" => $m->getDescTamanho());


// }

// echo "<pre>";
// print_r($arrModelo);

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

                    <div class="col-sm-12 col-md-12 mb-3 d-flex flex-row flex-column">
                        <div class="card ">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    <?php echo $produto[0]->getDescProd();?>

                                </h4>
                                <p class="card-text goToDescription"><a href="#details" class="scroll-to">Role para detalhes do produto, material e cuidado e dimensionamento</a>
                                </p>
                                <p class="price">$124.00</p>
                                <p class="buttons">
                                    <a href="" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</a>
                                    <!--                                     <a href="" class="btn btn-default"><i class="fa fa-heart"></i> Add a lista de desejo</a> -->
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

                    <div class="row mt-2">

                        <h3 class="text-center">Cores e Tamanhos</h3>

                        <div class="container border col-md-6 text-center pb-0">

                            <a href=""><span class="corProd bg-danger"></span></a>

                            <a href=""><span class="corProd bg-danger"></span></a>

                            <a href=""><span class="corProd bg-danger"></span></a>

                            <a href=""><span class="corProd bg-danger"></span></a>


                        </div>

                        <div class="container border col-md-6 text-center pb-0">

                            <a href=""><span class="corProd">P</span></a>

                            <a href=""><span class="corProd">P</span></a>

                            <a href=""><span class="corProd">P</span></a>

                            <a href=""><span class="corProd">P</span></a>


                        </div>


                    </div>


                </div>
            </div>


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


                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="assets/produtos/frenteProduto1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Produto 6

                                </h4>
                                <p class="card-text">R$111,00</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="assets/produtos/frenteProduto1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Produto 6

                                </h4>
                                <p class="card-text">R$111,00</p>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="assets/produtos/frenteProduto1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Produto 6

                                </h4>
                                <p class="card-text">R$111,00</p>

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


                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="assets/produtos/frenteProduto1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Produto 6

                                </h4>
                                <p class="card-text">R$111,00</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="assets/produtos/frenteProduto1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Produto 6

                                </h4>
                                <p class="card-text">R$111,00</p>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="assets/produtos/frenteProduto1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    Produto 6

                                </h4>
                                <p class="card-text">R$111,00</p>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<?php include_once "inferior.php";?>

