<?php
include_once 'header.php';

include_once '../dal/CorDAL.php';
include_once '../dal/TamanhoDAL.php';
include_once '../dal/ProdutoDAL.php';

$cor = CorDAL::buscaCor();
$tamanho = TamanhoDAL::buscaTamanho();
$produto = ProdutoDAL::buscaProduto();
?>

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modelos</h4>
                    <form action="controller/controllerModelo.php" method="POST" enctype="multipart/form-data"
                    id="formProduto">

                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Descrição</label> <input
                                type="text" id="descModelo" class="form-control"
                                placeholder="Camiseta Hell Kitty tamanho P"
                                name="descModelo"> <small
                                class="form-control-feedback text-danger"> This is inline
                            help </small>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Tamanho</label> <select
                            class="form-control" name="tamanhoModelo" id= "tamanhoModelo">
                            <option value="">Selecione...</option>
                            
                            <?php 
                            foreach ($tamanho as $tm){

                               echo "<option value='{$tm->getIdTamanho()}'>{$tm->getSiglaTamanho()}</option>";
                           }

                           ?>


                       </select>
                   </div>
               </div>

               <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label">Cor</label> 
                    <select
                    class="form-control " id ="corModelo" name="corModelo" >
                    <option value="">Selecione...</option>

                    <?php 
                    foreach ($cor as $cr){
                        echo "<option value='{$cr->getIdCor()}' class = '{$cr->getHexCor()}' >{$cr->getDescCor()}</option>";
                    }
                    ?> 

                </select>
            </div>
        </div>

        <div class="col-md-1">
            <div class="form-group">
                <label class="control-label" id="lblCor">Cor</label> 
                <input type="text" id="txtCor" class="form-control" disabled> 
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Produto</label> 
                <select class="form-control " name="produtoModelo" id = "produtoModelo">
                    <option value="">Selecione...</option>
                    <?php 
                    foreach ($produto as $prod) {
                        echo "<option value = '{$prod->getIdProd()}'>{$prod->getDescProd()}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Valor</label> 
                <input type="text" id="txtValorModelo" name = "txtValorModelo" class="form-control" placeholder="R$ 100,00" name="txtNomeProduto"> 
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
                                data-toggle="statusModelo" data-title="Ativo">Ativo</a>
                                <a class="btn btn-secondary btn-sm notActive"
                                data-toggle="statusModelo" data-title="Inativo">Inativo</a>
                            </div>
                            <input type="hidden" name="statusModelo" value="Ativo" 
                            id="statusModelo">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- CATEGORIA -->

    <div class="container ">
        <h3 class="box-title m-t-40 text-center">Fotos do Modelo</h3>


        <div class="row">
            <div class="col-md-3">

                <input name="numero" value="0" class="inputNumero"> <br>
                <input type="file" name="capa" id="capaInput" onchange=" trocaCapa();" class="filesFoto" ><br>

                <iframe src="" frameborder="0" name="gravaCapa" style = "display: none;"></iframe>
                <div class="cameraCapaModelo col-12 text-center border-white" onclick="document.all.capaInput.click();">

                    <img name = "imageEstbl" src="images/logoNot.png"  class="col-12  avatar1 border-white" id = "capaImg" onerror='this.src="images/logoNot.png";parar();') >
                </div>
            </div>

            <?php

            for ($i=1; $i <=3 ; $i++) { 

                echo '
                <div class="col-md-3">

                <input name="numero" value="'.$i.'" class="inputNumero"> <br>
                <input type="file" name= "foto'.$i.'"  id="foto'.$i.'" onchange="trocaFoto'.$i.'();" class="filesFoto"><br>

                <iframe src="" frameborder="0" name="gravaFoto'.$i.'" style = "display: none;"></iframe>
                ';

                echo '
                <div class="cameraModeloFoto'.$i.' cameraModelo col-12 border-white" onclick="document.all.foto'.$i.'.click(); "> <img name = "imageEstbl" src="images/logoNot.png"  class="col-12 avatar1 border-white" id = "foto'.$i.'Img" onerror=\'this.src="images/logoNot.png" parar();\') ></div><br>

                </div>
                ';
            }

            ?>


        </div>

        <!-- /CAPA -->
    </div>

    <input type="submit" value = "vaiPorra">

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


<div class="table-responsive m-t-40">
    <h6 class="card-subtitle">Modelos Cadastrados</h6>

    <table id="tableCategoria"
    class="display nowrap table table-hover table-striped table-bordered text-center"
    cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Status</th>
            <th class="text-center">Ações</th>

        </tr>
    </thead>

    <tbody>

       <!--  <?php

        foreach ($categorias as $categoriaTabela) {
            if ($categoriaTabela->getCodPai() == NULL) {
                echo "
                <tr>

                <td>" . $categoriaTabela->getIdCateg() . "</td>
                <td>" . $categoriaTabela->getDescCateg() . "</td>
                <td><span class = 'badge badge-success'>" . $categoriaTabela->getStatusCateg() . "</span></td>
                <td class='text-center'><button class='btn btn-inverse' id = '" . $categoriaTabela->getIdCateg() . "'>Alterar</button></td>
                </tr>
                ";
            }
        }

        ?> -->
    </tbody>
</table>
</div>



</div>
</div>
</div>
</div>
<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include_once 'footer.php'; ?>



<script>

    $("#corModelo").change(function(event) {
        $cor =  ($("#corModelo option:selected").attr('class'));

        $("#txtCor").css('background', $cor);
    });


    function trocaCapa() {

        var oArq = new FileReader();

        oArq.onloadend = function() {
            document.getElementById('capaImg').src = oArq.result;


        }
        if (document.all.capaInput.files[0]) {
            oArq.readAsDataURL(document.all.capaInput.files[0]); // Comando para carregar imagem na memória.
            document.getElementById('capaImg').style.display = "inline-block";


        } else {

            document.all.imgBanner.style.display = "none";

        }
    }

    $("#txtValorModelo").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});



    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })

</script>

<?php 
echo "<script>";

for ($i=1; $i <= 3; $i++) { 

    echo '
    function trocaFoto'.$i.'() {

        var oArq'.$i.' = new FileReader();

        oArq'.$i.'.onloadend = function() {
            document.getElementById("foto'.$i.'Img").src = oArq'.$i.'.result;


        }
        if (document.all.foto'.$i.'.files[0]) {
            oArq'.$i.'.readAsDataURL(document.all.foto'.$i.'.files[0]);
            document.getElementById("foto'.$i.'Img").style.display = "inline-block";


            } else {

                document.all.imgBanner.style.display = "none";

            }
        }
        ';

    }

    echo "</script>";


    ?>

