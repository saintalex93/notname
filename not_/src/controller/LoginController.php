<?php

session_start();
require_once '../dal/LoginDAL.php';

$usuarioRequest = $_POST['login'];
$senhaRequest = $_POST['password'];

$usuario = new Login();
$usuario->setLogin($usuarioRequest);
$usuario->setSenha($senhaRequest);
$loginUsuario = LoginDal::login($usuario);
/*
 * Aqui era para ser comparado com INT, mas a gambiarra fala mais alto.
 *
 */
if (strlen($loginUsuario[0]['HANDSHAKE']) < 10) {
    $_SESSION['user']['id'] = $loginUsuario[0]['HANDSHAKE'];
    echo $_SESSION['user']['id'];
} else {
    echo $loginUsuario[0]['HANDSHAKE'];
}
?>

