<?php
include_once 'header.php';
include_once '../dal/VendaPainelCountDAL.php';

$count = VendaPainelCountDAL::recuperaVendaAberta();

$total = $count[0]['VALOR_VENDA'];
$vendas = $count[0]['CLI_VENDAS'];
$clientes = $count[0]['CLI_VENDAS'];
$modelos = $count[0]['NUMERO_MODELOS'];

$total = "R$ ".number_format($total, 2, ",",".");

$tablePainel = VendaPainelCountDAL::vendasPainel();


?>

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-3">
            <div class="card p-20">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-usd f-s-30 color-primary"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h4><?php echo $total; ?></h4>
                        <p class="m-b-0">Total Vendas</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-20">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-shopping-cart f-s-30 color-success"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h4><?php echo $vendas; ?></h4>
                        <p class="m-b-0">Vendas</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-20">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-archive f-s-30 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h4><?php echo $modelos; ?></h4>
                        <p class="m-b-0">Produtos</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-20">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-user f-s-30 color-danger"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h4><?php echo $clientes; ?></h4>
                        <p class="m-b-0">Clientes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-white m-l-0 m-r-0 box-shadow ">

        <!-- column -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Demonstrativo de Vendas</h4>
                    <div id="extra-area-chart"></div>
                </div>
            </div>
        </div>
        <!-- column -->

        <!-- column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body browser">
                    <p class="f-w-600">Camisetas Masculinas<span class="pull-right">85%</span></p>
                    <div class="progress ">
                        <div role="progressbar" style="width: 85%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                    </div>

                    <p class="m-t-30 f-w-600">Camisetas Femininas<span class="pull-right">90%</span></p>
                    <div class="progress">
                        <div role="progressbar" style="width: 90%; height:8px;" class="progress-bar bg-info wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                    </div>

                    <p class="m-t-30 f-w-600">Camisetas Temáticas<span class="pull-right">65%</span></p>
                    <div class="progress">
                        <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                    </div>

                    <p class="m-t-30 f-w-600">Camisetas de Séries<span class="pull-right">65%</span></p>
                    <div class="progress">
                        <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-warning wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                    </div>

                    <p class="m-t-30 f-w-600">Amarola<span class="pull-right">65%</span></p>
                    <div class="progress m-b-30">
                        <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
    <div class="row">
<!--        <div class="col-lg-3">
        <div class="card bg-dark">
            <div class="testimonial-widget-one p-17">
                <div class="testimonial-widget-one owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img" src="images/avatar/2.jpg" alt="" />
                            <div class="testimonial-author">John</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img" src="images/avatar/3.jpg" alt="" />
                            <div class="testimonial-author">Abraham</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img" src="images/avatar/1.jpg" alt="" />
                            <div class="testimonial-author">Lincoln</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img" src="images/avatar/4.jpg" alt="" />
                            <div class="testimonial-author">TYRION LANNISTER</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img" src="images/avatar/5.jpg" alt="" />
                            <div class="testimonial-author">TYRION LANNISTER</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img" src="images/avatar/6.jpg" alt="" />
                            <div class="testimonial-author">TYRION LANNISTER</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Vendas Recentes </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="30%">Nome</th>
                                <th width="20%">Total</th>
                                <th>Quantidade Produtos</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php 

                            foreach ($tablePainel as $tp) {

                                $total = "R$ ".number_format($tp['TOTAL'], 2, ",",".");

                                switch ($tp['VENDA_cSTATUS']) {

                                    case 'PAGA':

                                    echo "
                                    <tr>
                                    <td>$tp[VENDA_nID]</td>
                                    <td>$tp[CLI_cNOME]</td>
                                    <td><span>$total</span></td>
                                    <td><span>$tp[QUANTIDADE] pcs</span></td>
                                    <td><span class='badge badge-success'>$tp[VENDA_cSTATUS]</span></td>
                                    </tr>
                                    ";

                                    break;

                                    case 'AGUARDANDO PAGAMENTO':

                                    echo "
                                    <tr>
                                    <td>$tp[VENDA_nID]</td>
                                    <td>$tp[CLI_cNOME]</td>
                                    <td><span>$total</span></td>
                                    <td><span>$tp[QUANTIDADE] pcs</span></td>
                                    <td><span class='badge badge-warning'>$tp[VENDA_cSTATUS]</span></td>
                                    </tr>
                                    ";
                                    break;

                                    case 'CANCELADA':

                                    echo "
                                    <tr>
                                    <td>$tp[VENDA_nID]</td>
                                    <td>$tp[CLI_cNOME]</td>
                                    <td><span>$total</span></td>
                                    <td><span>$tp[QUANTIDADE] pcs</span></td>
                                    <td><span class='badge badge-danger'>$tp[VENDA_cSTATUS]</span></td>
                                    </tr>
                                    ";
                                    break;


                                    default:
                                    case 'CANCELADA':

                                    echo "
                                    <tr>
                                    <td>$tp[VENDA_nID]</td>
                                    <td>$tp[CLI_cNOME]</td>
                                    <td><span>$total</span></td>
                                    <td><span>$tp[QUANTIDADE] pcs</span></td>
                                    <td><span class='badge badge-secondary'>$tp[VENDA_cSTATUS]</span></td>
                                    </tr>
                                    ";

                                }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Relatório de venda por ano</h4>
            <div id="morris-bar-chart"></div>
        </div>
    </div>
</div>


                                <!-- <div class="row">
                                <div class="col-lg-8">
                                <div class="row">
                                <div class="col-lg-6">
                                <div class="card">
                                <div class="card-title">
                                <h4>Message </h4>
                                </div>
                                <div class="recent-comment">
                                <div class="media">
                                <div class="media-left">
           <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
           </div>
           <div class="media-body">
           <h4 class="media-heading">john doe</h4>
           <p>Cras sit amet nibh libero, in gravida nulla. </p>
           <p class="comment-date">October 21, 2018</p>
           </div>
           </div>
           <div class="media">
           <div class="media-left">
           <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
           </div>
           <div class="media-body">
           <h4 class="media-heading">john doe</h4>
           <p>Cras sit amet nibh libero, in gravida nulla. </p>
           <p class="comment-date">October 21, 2018</p>
           </div>
           </div>

           <div class="media">
           <div class="media-left">
           <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
           </div>
           <div class="media-body">
           <h4 class="media-heading">john doe</h4>
           <p>Cras sit amet nibh libero, in gravida nulla. </p>
           <p class="comment-date">October 21, 2018</p>
           </div>
           </div>

           <div class="media no-border">
           <div class="media-left">
           <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
           </div>
           <div class="media-body">
           <h4 class="media-heading">Mr. Michael</h4>
           <p>Cras sit amet nibh libero, in gravida nulla. </p>
           <div class="comment-date">October 21, 2018</div>
           </div>
           </div>
           </div>
           </div>
           </div>
           <div class="col-lg-6">
           <div class="card">
           <div class="card-body">
           <div class="year-calendar"></div>
           </div>
           </div>
           </div>


           </div>
           </div>

           <div class="col-lg-4">
           <div class="card">
           <div class="card-body">
           <h4 class="card-title">Todo</h4>
           <div class="card-content">
           <div class="todo-list">
           <div class="tdl-holder">
           <div class="tdl-content">
           <ul>
           <li>
           <label>
           <input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
           <a href='#' class="ti-close"></a>
           </label>
           </li>
           <li>
           <label>
           <input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
           <a href='#' class="ti-close"></a>
           </label>
           </li>
           <li>
           <label>
           <input type="checkbox" checked><i class="bg-warning"></i><span>Follow back those who follow you</span>
           <a href='#' class="ti-close"></a>
           </label>
           </li>
           <li>
           <label>
           <input type="checkbox" checked><i class="bg-danger"></i><span>Design One page theme</span>
           <a href='#' class="ti-close"></a>
           </label>
           </li>

           <li>
           <label>
           <input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
           <a href='#' class="ti-close"></a>
           </label>
           </li>
           </ul>
           </div>
           <input type="text" class="tdl-new form-control" placeholder="Type here">
           </div>
           </div>
           </div>
           </div>
           </div>
           </div>

       </div> -->


       <!-- End PAge Content -->
   </div>
   <!-- End Container fluid  -->
   <?php
   include_once 'footer.php';
   ?>

   <script src="js/lib/morris-chart/dashboard1-init.js"></script>
