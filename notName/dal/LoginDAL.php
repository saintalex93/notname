<?php
require_once '../library/Database.php';
require_once '../model/Login.php';
class LoginDAL extends Database{


	public function login($usuario, $senha) : string{



		selectDB("SELECT * FROM USUARIO");

		// $sql = "USP_LOGIN(?,?)";
		// $stmt = $connection->prepare($sql);

		// $stmt->bindParam(1, $usuario, PDO::PARAM_STR|PDO::PARAM_INT, 20);
		// $stmt->bindParam(2, $senha, PDO::PARAM_INT, 20);


		// $stmt->execute();

		// var_dump($stmt);

	}






}


$login = new LoginDAL();
$login->login();


