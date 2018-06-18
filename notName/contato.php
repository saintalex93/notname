<?php include "superior.php";?>


<div id="content">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Contato</li>
                    </ol>
                </nav>

            </div>

            <div class="col-md-3">
                <div class="card card-default sidebar-menu py-3 px-3">

                    <div class="card-heading">
                        <h3 class="cardcard-title text-center">Fale Conosco</h3>
                    </div>

                    <div class="card-body ">
                        <ul class="nav nav-pills ">
                            <div class="menuContato">
                                <li>
                                    <a href="contato.php">Contato</a><br>
                                </li>


                                <li>
                                    <a href="faq.php">FAQ</a>
                                </li>
                            </div>

                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="banner">
                        <a href="#">
                            <img src="assets/" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>



            </div>


            <div class="col-md-9">


                <div class="card conteudoContato" id="contact">
                    <h1>Contato</h1>

                    <p class="lead">Dúvidas sobre o seu pedido, feedbacks, sugestões ou críticas? </p>
                    <p>Fale conosco através do formulário abaixo, e assim crescemos juntos</p>

                    <hr>

                    <div class="row">
                        <div class="col-sm-4">
                            <h3><i class="fa fa-map-marker"></i> Endereço</h3>
                            <p>
                                <br>São Paulo - SP
                                <br>
                                <br>
                                <strong>Brasil</strong>
                            </p>
                        </div>

                        <div class="col-sm-4">
                            <h3><i class="fab fa-whatsapp" ></i> Central de Atendimento</h3>
                            <p class="text-muted">Whatsapp</p>
                            <p><strong>+11 5837-7690</strong>
                            </p>
                        </div>

                        <div class="col-sm-4">
                            <h3><i class="fa fa-at"></i>Suporte eletrônico</h3>
                            <p class="text-muted">Por favor, sinta-se livre para escrever um e-mail para nós.</p>
                            <p><strong><a href="mailto:">contato@not.com.br</a></strong></p>

                        </div>

                    </div>


                    <hr>

                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.5100311127194!2d-46.727594685445!3d-23.44206028474223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cefbbe9184af9f%3A0x785d4da8669f6671!2sEtec+Jaragu%C3%A1!5e0!3m2!1spt-BR!2sbr!4v1525977586152" width="755" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <hr>
                    <h2>Formulário de Contato</h2>

                    <form id="formContato" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="primeiroNome">Nome</label>
                                    <input type="text" name="primeiroNome" class="form-control" id="primeiroNome">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="tel" name="celular" class="form-control" id="celular">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="assunto">Assunto</label>
                                    <input type="text" name="assunto" class="form-control" id="assunto">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mensagem">Mensagem</label>
                                    <textarea id="mensagem" name="mensagem" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="button" class="btn btn-primary" id="btnContato"><i class="fa fa-envelope-o"></i>Enviar mensagem</button>

                        </div>

                    </form>


                </div>

            </div>
        </div>

    </div>

</div>


<?php include_once "inferior.php";?>

<script src="js/contato.js"></script>
