<?php
session_start(); 
$conecta = mysqli_connect('127.0.0.1', 'notnamec_usr', 'hds24@carol', 'notnamec_db');
	mysqli_set_charset($conecta, "utf8");




$sql = "SELECT VENDA_nID, DATEDIFF(NOW(), VENDA_dtDTCOMPRA) as dif 
               FROM VENDA where VENDA_cSTATUS like 'PENDENTE'";

$result = mysqli_query($conecta, $sql);

while($dados = mysqli_fetch_assoc($result)){
	if($dados['dif'] >=0){
		$sql = "UPDATE VENDA SET VENDA_cSTATUS = 'CANCELADA' where VENDA_nID = $dados[VENDA_nID]";
		if(mysqli_query($conecta, $sql)){

			$sql = "SELECT VENDA_MODELO_QDTE, VENDA_nID, MODELO_nID from VENDA_MODELO where VENDA_nID = $dados[VENDA_nID]";
			echo $sql;

			$result2 = mysqli_query($conecta, $sql);

			while($dados2 = mysqli_fetch_assoc($result2)){

				$sql = "UPDATE MODELO SET MODELO_nQTD_ESTOQUE = MODELO_nQTD_ESTOQUE+$dados2[VENDA_MODELO_QDTE] where MODELO_nID = $dados2[MODELO_nID]";
				mysqli_query($conecta, $sql);
				echo $sql;

				$sql2 = "UPDATE VENDA_MODELO SET VENDA_MODELO_QDTE = 0, VENDA_MODELO_dVLR_MODELO = 0.00 WHERE VENDA_nID = $dados2[VENDA_nID]";
				mysqli_query($conecta, $sql);
				echo $sql2;
			}

		}
	}
}



unset($_SESSION['ID_VENDA']);
echo "Concluído";


 ?>