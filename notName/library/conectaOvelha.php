<?php 


$con = mysqli_connect('192.185.176.119', "notnamec_usr", "hds24@carol", "notnamec_db");
	mysqli_set_charset($con,"utf8");





function query_rs($sql){

$result = mysqli_query($con, $sql);

return $result;

	


}

function fecharConexao($conexao)
{
	$con = null;
}


?>