<?php
require_once '../library/Conexao.class.php';
require_once '../model/Login.php';
class LoginDAL{

private static $connection = null;

 private static function connect()
    {
        if (is_null(LoginDAL::$connection)) {
            LoginDAL::$connection = new Database();
        }
    }

	public function login(){

		LoginDAL::connect();

		LoginDAL::$connection->executarSQL("SELECT * FROM USUARIO");

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



// $login = $_GET['usuario'];

// 		//Recupera a senha
// $senha = $_GET['senha'];



// $sql = "SELECT * FROM USUARIO WHERE USR_LOGIN = '$login'"; 


// $result = mysqli_query($conecta, $sql);  
// $json_array = array(); 

// if($row = mysqli_fetch_assoc($result))  
// {  
// 	$json_array[] = $row;  
// }  



// 		if (sizeof($json_array)<1){
			
// 			echo $response["fail"] = 0;
// 		}

// 		else if (str_replace(['"'], "",json_encode($json_array[0]['USR_SENHA'])) != $senha)
// 			echo $response["fail"] = -2;	

// 		else if (str_replace(['"'], "",json_encode($json_array[0]['USR_STATUS'])) != 1)
// 			echo $response["fail"] = -3;

// 		else if(str_replace(['"'], "",json_encode($json_array[0]['USR_SENHA'])) == $senha && str_replace(['"'], "",json_encode($json_array[0]['USR_LOGIN'])) == $login){


// 			$user = (object)[
// 				'id' => $json_array[0]['USR_COD'],
// 				'name' => $json_array[0]['USR_NOME'],
// 				'username' => $json_array[0]['USR_LOGIN'],
// 				'permission' => $json_array[0]['USR_PERMISSAO'],
// 				'password' => password_hash($json_array[0]['USR_SENHA'], PASSWORD_DEFAULT)
// 			];

// 			$_SESSION['user'] = [
// 				'id' => $user->id,
// 				'name' => $user->name,
// 				'username' => $user->username,
// 				'permission' => $user->permission

// 			];


// 			if($_SESSION['user']['permission'] == 2){

// 				echo $response["success"] = 2;

// 			}
			

// 			else{
// 				echo $response["success"] = 1;

// 			}
			
			
// 		}




// 		mysqli_close($conecta);


		



