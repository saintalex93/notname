<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/notname/notName/url.php';
require_once $raiz . 'dal/ModeloDAL.php';
require_once $raiz . 'library/Conexao.class.php';

if ($_REQUEST['action'] == 'insereModelo') {
	$toReplace = array(
		"R$",
		"."
	);
	$vlrModelo = $_REQUEST['txtValorModelo'];
	$vlrModelo = str_replace($toReplace, "", $vlrModelo);
	$vlrModelo = str_replace(",", ".", $vlrModelo);

	$modelo = new Modelo();
	$errorImg = array();
	$controleImg = 0;

	$modelo->setNomeModelo($_REQUEST['descModelo']);
	$modelo->setVlrVendaModelo($vlrModelo);
	$modelo->setStatusModelo($_REQUEST['statusModelo']);
	$modelo->setDescontoModelo(0);
	$modelo->setQtdEstoqueModelo($_REQUEST['quantidadeModelo']);
	$modelo->setCormodelo($_REQUEST['corModelo']);
	$modelo->setTamanhoModelo($_REQUEST['tamanhoModelo']);
	$modelo->setProdutoIdModelo($_REQUEST['produtoModelo']);

	if ($id = ModeloDAL::insereModelo($modelo)) {

		$cod = "ModeloCapa_" . $id;
		$imagem = $_FILES['capa']['name'];
        // Segunda Imagem
		if (move_uploaded_file($_FILES['capa']['tmp_name'], "{$raiz}img/Modelos/" . $cod.".jpg")) {
			$controleImg++;
		}
		else{
			echo "Not uploaded CAPA because of error #".$_FILES["capa"]["error"];
		}
        // Segunda Imagem
		$cod1 = "ModeloImg1_" . $id;
		$imagem1 = $_FILES['foto1']['name'];
		if (move_uploaded_file($_FILES['foto1']['tmp_name'], "{$raiz}img/Modelos/" . $cod1.".jpg")) {
			$controleImg++;
		}
		else{
			echo "Not uploaded foto1 because of error #".$_FILES["foto1"]["error"];
		}

        // Segunda Imagem
		$cod2 = "ModeloImg2_" . $id;
		$imagem2 = $_FILES['foto2']['name'];
		if (move_uploaded_file($_FILES['foto2']['tmp_name'], "{$raiz}img/Modelos/" . $cod2.".jpg")) {
			$controleImg++;
		}
		else{
			echo "Not uploaded foto2 because of error #".$_FILES["file"]["error"];
		}

        // Segunda Imagem
		$cod3 = "ModeloImg3_" . $id;
		$imagem3 = $_FILES['foto3']['name'];
		if (move_uploaded_file($_FILES['foto3']['tmp_name'], "{$raiz}img/Modelos/" . $cod3.".jpg")) {
			$controleImg++;
		}
		else{
			echo "Not uploaded foto3 because of error #".$_FILES["file"]["error"];
		}


	} else {
		echo 'Erro ao cadastrar modelo';
	}

	if($controleImg == 4){
		echo "Modelo cadastrado com sucesso!";
	}
	else{
	    ModeloDAL::removeModelo($modelo);
	    echo "Erro ao cadastrar o modelo. Refaça o cadastro";
	}
}


?>