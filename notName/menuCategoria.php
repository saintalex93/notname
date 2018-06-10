<?php
include_once 'library/Conexao.class.php';
include_once 'dal/CorDAL.php';
include_once 'dal/CategoriaDAL.php';

$colorsMount = CorDAL::buscaCorAmount();
$categoria = CategoriaDAL::buscaCategoriaIndex();
$categFilha = array();
foreach ($categoria as $cf) {
    if ($cf->getCodPai() != null) {
        array_push($categFilha, $cf);
    }
}


?>


<div class="col-md-3">
	<!-- *** menus e Filtros *** -->
	<div class="card card-default sidebar-menu">

		<div class="card-heading titulo-categoria-menu">
			<h3 class="cardcard-title">Categoria</h3>
		</div>

		<div class="card-body">
			<ul class="nav nav-pills flex-column category-menu">

             <?php
             $idPai = 0;
             foreach ($categoria as $conCat) {
                if ($conCat->getCodPai() == null) {
                    echo "

                    <li id = '{$conCat->getIdCateg()}'>
                    <a href='#'>{$conCat->getDescCateg()} <span
                    class='badge pull-right badge-primary badge-pill'></span></a>
                    ";
                    $idPai = $conCat->getIdCateg();
                    
                    foreach ($categFilha as $cf) {
                        
                        if ($idPai == $cf->getCodPai()) {
                            echo "
                            <ul>
                            <li class='text-black' id = '{$cf->getDescCateg()}'><a href=''>{$cf->getDescCateg()}</a></li>
                            </ul>
                            ";
                        }
                    }
                    
                    echo "

                    </li>

                    ";
                }
            }
            
            ?>

        </ul>

    </div>
</div>



<div class="card card-default sidebar-menu my-4">

  <div class="card-heading titulo-categoria-menu">
     <h3 class="card-title">
        Cores <a class="btn btn-xs btn-danger pull-right" href="#"><i
           class="fa fa-times-circle"></i> Limpar</a>
       </h3>
   </div>

   <div class="card-body">

       <form>
        <div class="form-group">

            <?php
            foreach ($colorsMount as $cm) {
                
                echo "
                <div class='checkbox'>
                <label>
                <input type='checkbox' name = 'colors[]' id = '{$cm->getIdCor()}'> 
                <span class='cor' style = 'background-color: {$cm->getHexCor()}'></span> {$cm->getDescCor()} ({$cm->getCount()})
                </label>
                </div>

                ";
            }
            
            ?>     

        </div>

        <button class="btn btn-default btn-sm btn-primary">
         <i class="fa fa-pencil"></i> Aplicar
     </button>

 </form>

</div>
</div>


<div class="col-md-9">
  <div class="banner">
   <a href="#"> <img src="assets/logo.png" alt="sales 2014"
    class="img-responsive">
</a>
</div>
</div>



</div>
