<?php
include "superior.php";
//Resolver problema de acesso a pagina, ele nao direciona para a index e e possivel acessar ele atraves da barra

?>



	<div class="container mb-4">

		<div class="col-md-12 my-3">


			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>

					<li class="breadcrumb-item active" aria-current="page">Nova conta /
						Entrar</li>

				</ol>
			</nav>

		</div>


		<div class="row">
			<div class="col-md-6 d-flex flex-row">
				<div class="card py-3 px-3">
					<h1>Nova conta</h1>

					<p class="lead">Não é nosso cliente cadastrado ainda?</p>
					<p class="texto">Com registro conosco novo mundo da moda, descontos
						fantásticos e muito mais se abre para você! Todo o processo não
						levará mais que um minuto!</p>
					<p class="text-muted">
						Se você tiver alguma dúvida, não hesite em <a href="contato.php">contactar-nos</a>,
						a nossa centro de atendimento ao cliente está trabalhando para
						você 24/7.
					</p>

					<hr>

					<form id="formRegister">
						<div class="form-group">
							<label for="nome">Nome</label> <input type="text"
								class="form-control" id="nome" name="nome">
						</div>
						<div class="form-group">
							<label for="emailRegistro">E-mail</label> <input type="text"
								class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="password">Senha</label> <input type="password"
								class="form-control" id="password" name="password">
						</div>
						<div class="text-center">
							<input type="hidden" name="insereCli" value="Cadastrar">
							<button type="button" class="btn btn-primary" id="insereCli"
								name="insereCli">
								<i class="fa fa-user-md"></i> Registrar
							</button>
							<br> <label name="returnFormRegistrar" id="returnFormRegistrar"></label>
						</div>

					</form>
				</div>
			</div>

			<div class="col-md-6 d-flex flex-row ">
				<div class="card py-3 px-3">
					<h1>Entrar</h1>

					<p class="lead">Já é nosso cliente?</p>
					<p class="text-muted texto">Pellentesque habitante morbi tristique
						senectus e netus et machuada fames ac turpis egestas. Vestibulum
						tortor quam, feugiat vitae, ultricies eget, senta-se
						temporariamente, ante. Donec eu libero sit amet quam egestas
						sempre. Aiean, ultricies, mi vitae, est., Mauris, placerat,
						eleifend, leo.</p>

					<hr>

					<form class="formLogCli">
						<div class="form-group">
							<label for="email">Email</label> <input type="text"
								class="form-control emailLog"  name="emailLog">
						</div>
						<div class="form-group">
							<label for="senha">Senha</label> <input type="password"
								class="form-control senha" name="senha">
						</div>
						<div class="text-center">
							<input type="hidden" name="logaCli" value="Entrar">

							<button type="button" class="btn btn-primary logaCli" name="logaCli">
								
								<i class="fa fa-sign-in"></i>Entrar
							</button>
							<br> <label name="returnFormLogCli" class="returnFormLogCli"></label>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>




<?php include_once "inferior.php";?>
<script src="./js/cadastraCli.js"></script>





