<?php
include_once 'library/Conexao.class.php';
include_once 'dal/CorDAL.php';
include_once 'dal/CategoriaDAL.php';

$colorsMount = CorDAL::buscaCorAmount();
$categoria = CategoriaDAL::buscaCategoria();

$categorias = array();

foreach ($categoria as $categ) {
    if ($categ->getCodPai() == null and $categ->getStatusCateg() == 'Ativo') {
        $categorias[] = array(
            "ID" => $categ->getIdCateg(),
            "NOME" => $categ->getDescCateg()
        );
    }
}

foreach ($categoria as $catNode) {
    if ($catNode->getCodPai() != null) {
        $categorias[array_search($catNode->getCodPai(), array_column($categorias, 'ID'))] += array(
            "ID_FILHA" => $catNode->getIdCateg(),
            "DESC_FILHA" => $catNode->getDescCateg()
        );
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
               
               foreach ($categorias as $conCat) {
                
                echo "

                <li id = '{$conCat['ID']}'>
                <a href='#'>{$conCat['NOME']} <span
                class='badge pull-right badge-primary badge-pill'>42</span></a>

                ";
                
                if (array_key_exists("DESC_FILHA", $conCat)) {
                    echo "

                    <ul>
                    <li class='text-black' id = '{$conCat['ID_FILHA']}'><a href=''>{$conCat['DESC_FILHA']}</a></li>
                    </ul>
                    ";
                }
                
                echo "

                </li>

                ";
            }
            
            ?>


            <!-- 				<li class="active"><a href="category.html">Pirralhos <span -->
                <!-- 						class="badge pull-right badge-primary badge-pill">123</span></a> -->
                <!-- 					<ul> -->
                    <!-- 						<li class="text-black"><a href="">categoria 1</a></li> -->
                    <!-- 						<li class="text-black"><a href="">categoria 2</a></li> -->
                    <!-- 						<li class="text-black"><a href="">categoria 3</a></li> -->
                    <!-- 						<li class="text-black"><a href="">categoria 4</a></li> -->
                    <!-- 					</ul></li> -->
                    <!-- 				<li><a href="category.html">Acessórios <span -->
                        <!-- 						class="badge pull-right badge-primary badge-pill">11</span></a> -->
                        <!-- 					<ul> -->
                            <!-- 						<li class="text-black"><a href="">categoria 1</a></li> -->
                            <!-- 						<li class="text-black"><a href="">categoria 2</a></li> -->
                            <!-- 						<li class="text-black"><a href="">categoria 3</a></li> -->
                            <!-- 						<li class="text-black"><a href="">categoria 4</a></li> -->
                            <!-- 					</ul></li> -->
                            <!-- 				<li><a href="category.html">Pirralhos <span -->
                                <!-- 						class="badge pull-right badge-primary badge-pill">50</span></a> -->
                                <!-- 					<ul> -->
                                    <!-- 						<li class="text-black"><a href="">categoria 1</a></li> -->
                                    <!-- 						<li class="text-black"><a href="">categoria 2</a></li> -->
                                    <!-- 						<li class="text-black"><a href="">categoria 3</a></li> -->
                                    <!-- 						<li class="text-black"><a href="">categoria 4</a></li> -->
                                    <!-- 					</ul></li> -->

                                </ul>

                            </div>
                        </div>

	<!-- 	<div class="card card-default sidebar-menu my-4">

		<div class="card-heading titulo-categoria-menu">
			<h3 class="card-title">
				Marcas <a class="btn btn-xs btn-danger pull-right" href="#"><i
					class="fa fa-times-circle"></i> Clear</a>
			</h3>
		</div>

		<div class="card-body">

			<form>
				<div class="form-group">

					<div class="checkbox">
						<label> <input type="checkbox"> Marca 1 (10)
						</label>
					</div>
					<div class="checkbox">
						<label> <input type="checkbox"> marca 2 (12)
						</label>
					</div>
					<div class="checkbox">
						<label> <input type="checkbox"> marca 3 (15)
						</label>
					</div>
					<div class="checkbox">
						<label> <input type="checkbox"> marca 4 (14)
						</label>
					</div>
				</div>

				<button class="btn btn-default btn-sm btn-primary">
					<i class="fa fa-pencil"></i> Aplicar
				</button>

			</form>

		</div>
	</div> -->

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
