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


                <div class="col-md-3">

            <div class="card card-default sidebar-menu">

                <div class="card-heading">
                    <h3 class="card-title">Cliente</h3>
                </div>
<style>
    .teste ul li{
      
        width: 100%;
    }
    
                </style>
                <div class="card-body teste">

                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="painelCliente.php"><i class="fa fa-heart"></i> Meus pedidos</a>
                        </li>
                        <li  class="active">
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
                        <h1>Minha conta</h1>
                        <p class="lead">Altere seus dados pessoais ou sua senha aqui.</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias voluptate consectetur.</p>

                        <h3>Mudar senha</h3>

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="antigaSenha">Senha Antiga</label>
                                        <input type="password" class="form-control" id="antigaSenha">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="novaSenha">Nova Antiga</label>
                                        <input type="password" class="form-control" id="novaSenha">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="senhaNova">Digite novamente</label>
                                        <input type="password" class="form-control" id="senhaNova">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Salvar senha</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Detalhes pessoais</h3>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Primeiro nome</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Ultimo nome</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">cep</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" class="form-control" id="endereco">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">Cidade</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">texto</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">texto</label>
                                        <select class="form-control" id=""></select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="">texto</label>
                                        <select class="form-control" id=""></select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Telefone</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar alterações</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

          </div>
        </div>
       
<?php include "inferior.php";?>