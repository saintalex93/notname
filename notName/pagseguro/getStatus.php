<?php
	require_once("PagSeguro.class.php");

	if(isset($_GET['reference'])){
		$PagSeguro = new PagSeguro();
		$P = $PagSeguro->getStatusByReference($_GET['reference']);
		var_dump($PagSeguro->getStatusText($P->status));
	}else{
	    echo "Parâmetro \"reference\" não informado!";
	}

?>