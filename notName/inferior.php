</div>
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Paginas</h4>

                <ul>
                    <li><a href="#">Sobre</a>
                    </li>
                    <li><a href="#">Termos</a>
                    </li>
                    <li><a href="faq.php">FAQ</a>
                    </li>
                    <li><a href="contato.php">Contato</a>
                    </li>
                </ul>

                <hr>

                <h4>Seção do usuário</h4>

                <ul>
                    <li><a href="registrar.php">Login</a>
                    </li>
                    <li><a href="registrar.php">Registrar</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>


            <div class="col-md-3 col-sm-6">

                <h4>Top categorias</h4>

                <h5>Camisa</h5>

                <ul>
                    <li><a href="categoria.php">Series</a>
                    </li>
                    <li><a href="categoria.php">Amarola</a>
                    </li>
                    <li><a href="categoria.php">Believe</a>
                    </li>
                </ul>

                <h5>Camisa</h5>

                <ul>
                    <li><a href="categoria.php">Series</a>
                    </li>
                    <li><a href="categoria.php">Amarola</a>
                    </li>
                    <li><a href="categoria.php">Believe</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg">

            </div>


            <div class="col-md-3 col-sm-6">

                <h4>Onde nos encontrar</h4>

                <p><strong>Not Name.</strong>

                    <br>São Paulo - SP
                    <br>11 5837-7690
                    <br>
                    
                    <strong>contato@notname.com.br</strong>
                </p>

                <a href="contato.php">Ir para a página de contato</a>

                <hr class="hidden-md hidden-lg">

            </div>



            <div class="col-md-3 col-sm-6">

                <h4>Receba as novidades</h4>

                <p class="text-muted">Cadastre seu e-mail para receber dicas e novidades!</p>

                <div class="input-group">
                        <input type="email" class="form-control" id="textEmail">
                        <button class="btn btn-primary btn-green" type="button" id="btnEmail" required>Cadastrar</button>
                </div>


                <hr>

                <h4>Rede social</h4>

                <p class="social">
                    <a href="http://www.facebook.com/Not-Name-Company-200520313022950/?ref=br_rs" class="facebook external" data-animate-hover="shake"><i class="fab fa-facebook"></i></a>
                    <a href="http://www.instagram.com/notname_company" class="instagram external" data-animate-hover="shake"><i class="fab fa-instagram"></i></a>

                    <!--                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fab fa-twitter"></i></a>-->

<!--
                    <a href="#" class="gplus external" data-animate-hover="shake"><i class="fab fa-google-plus"></i></a>
                    <a href="#" class="email external" data-animate-hover="shake"><i class="fas fa-envelope"></i></a>
                -->
            </p>


        </div>


    </div>


</div>

</div>

<div id="copyright">
    <div class="container">
        <div class="col-md-12">
            <p class="text-center">© 2018 Not name.</p>

        </div>

    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/loginCli.js"></script>
<script src="js/jquery.blockUI.js"></script>
<script src="js/ajaxLoading.js"></script>
<!-- <script src="js/jquery.mask.js"></script> -->
<script src="js/jquery.maskedinput.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="">
    $("#btnEmail").click(function(event) {
        // carregando();

        $.ajax({
            url: 'controller/mailMarketing.php?email='+$("#textEmail").val(),

            success: function( response ) {

                swal("EmailMarketing", response, "success");
            }

        });
    });
</script>




</body>

</html>
