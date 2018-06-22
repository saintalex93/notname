<?php
include_once 'header.php';
include_once '../dal/CorDAL.php';
include_once '../dal/TamanhoDAL.php';
include_once '../dal/ProdutoDAL.php';
include_once '../dal/ModeloDAL.php';

$cor = CorDAL::buscaCor();
$tamanho = TamanhoDAL::buscaTamanho();
$produto = ProdutoDAL::buscaProduto();
$modelo = ModeloDAL::buscaModeloTabela();

?>

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modelos</h4>
                    <form id="formModelo" method="POST" enctype="multipart/form-data"
                    id="formProduto">

                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="idModelo" id="idModelo">
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
                            <option value="0">Selecione...</option>
                            
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
                    <option value="0">Selecione...</option>

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

        <div class="col-md-5">
            <div class="form-group">
                <label class="control-label">Produto</label> 
                <select class="form-control " name="produtoModelo" id = "produtoModelo">
                    <option value="0">Selecione...</option>
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

        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Quantidade</label> 
                <input type="number" id="quantidadeModelo" name = "quantidadeModelo" class="form-control" value = "0"> 
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group">

                <label class="control-label mb-3">Status</label>

                <div class="form-group">
                    <div class="col-sm-7 col-md-7">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" id="btnSactive" 
                                data-toggle="statusModelo" data-title="Ativo">Ativo</a>
                                <a class="btn btn-secondary btn-sm notActive" id="btnSinactive" 
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

                    <img name = "imageEstbl" src="images/logoNot.png"  class="col-12" id = "capaImg" onerror='this.src="images/logoNot.png"'>
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
                <div class="cameraModeloFoto'.$i.' cameraModelo col-12 border-white" onclick="document.all.foto'.$i.'.click(); "> <img name = "imageEstbl" src="images/logoNot.png"  class="col-12 foto" id = "foto'.$i.'Img" onerror=\'this.src="images/logoNot.png"\') ></div><br>

                </div>
                ';
            }

            ?>


        </div>

        <!-- /CAPA -->
    </div>

</form>


<div class="form-actions text-center mt-3">
    <button type="button" class="btn btn-success"
    id="btnCadastraModelo" value="1">
   <i class="fa fa-check"></i> <span id="spanButton">CADASTRAR</span>
</button>
<button type="button" class="btn btn-inverse" id="btnCancelModelo">
  <i class="fa fa-close"></i> CANCELAR
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

            <th hidden>Cor ID</th>
            <th hidden>Tamanho ID</th>
            <th hidden>Produto ID</th>


            <th>Descrição</th>
            <th>Tamanho</th>
            <th>Cor</th>
            <th>Produto</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th class="text-center">Ações</th>

        </tr>
    </thead>

    <tbody>
        <?php 

        foreach ($modelo as $md) {
            echo "
            <tr id = 'rowModelo{$md->getIdModelo()}'>
            <td>{$md->getIdModelo()}</td>

            <td hidden>{$md->getCormodelo()}</td>
            <td hidden>{$md->getTamanhoModelo()}</td>
            <td hidden>{$md->getProdutoIdModelo()}</td>
            



            <td>{$md->getNomeModelo()}</td>
            <td>{$md->getDescTamanho()}</td>
            <td>{$md->getDescCor()}</td>
            <td>{$md->getDescProduto()}</td>
            <td>R$ ".number_format($md->getVlrVendaModelo(), 2, ',', '.')."</td>
            <td>{$md->getQtdEstoqueModelo()}</td>
            
            <td>{$md->getStatusModelo()}</td>
            <td class='text-center'><button class='btn btn-inverse' id = '" . $md->getIdModelo() . "' onclick = 'alterarModelo(this.id);'>Alterar</button></td>

            </tr>


            ";
        }

        ?>

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
<script src="js/modelo.js"></script>

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

