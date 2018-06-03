<?php
include_once 'header.php';
?>

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modelos</h4>
                    <form action="#" method="POST" enctype="multipart/form-data"
                    id="formProduto">

                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Descrição</label> <input
                                type="text" id="firstName" class="form-control"
                                placeholder="Camiseta Hell Kitty tamanho P"
                                name="txtNomeProduto"> <small
                                class="form-control-feedback text-danger"> This is inline
                            help </small>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Tamanho</label> <select
                            class="form-control " data-placeholder="Choose a Category"
                            tabindex="1" name="marcaProduto">
                            <option value="">Selecione...</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Cor</label> <select
                        class="form-control " data-placeholder="Choose a Category"
                        tabindex="1" name="marcaProduto">
                        <option value="">Selecione...</option>

                    </select>
                </div>
            </div>


            <!--/span-->
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                        <label class="control-label">Produto</label> <select
                        class="form-control " data-placeholder="Choose a Category"
                        tabindex="1" name="marcaProduto">
                        <option value="">Selecione...</option>

                    </select>
                </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Valor</label> <input
                type="text" id="firstName" class="form-control"
                placeholder="Calça destacadora de perseguida"
                name="txtNomeProduto"> <small
                class="form-control-feedback text-danger"> This is inline
            help </small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">

            <label class="control-label mb-3">Status</label>

            <div class="form-group">
                <div class="col-sm-7 col-md-7">
                    <div class="input-group">
                        <div id="radioBtn" class="btn-group">
                            <a class="btn btn-primary btn-sm active"
                            data-toggle="statusProduto" data-title="Ativo">Ativo</a>
                            <a class="btn btn-secondary btn-sm notActive"
                            data-toggle="statusProduto" data-title="Inativo">Inativo</a>
                        </div>
                        <input type="hidden" name="statusProduto"
                        id="statusProduto">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- CATEGORIA -->

</form>

<form action="#" class="dropzone">
    <div class="fallback dropzone">
        <input name="file" type="file" multiple />
    </div>
</form>

<div class="form-actions text-center mt-3">
    <button type="button" class="btn btn-success"
    id="btnCadastroProduto">
    <i class="fa fa-check"></i> Cadastrar
</button>
<button type="button" class="btn btn-inverse">
    <i class="fa fa-check"></i> CANCEL
</button>
</div>

</div>
</div>
</div>
</div>
<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include_once 'footer.php'; ?>

