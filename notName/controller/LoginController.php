<?php

require_once '../dal/LoginDAL.php';

$usuario = new Login();
$usuario->setLogin("gabriela");
$usuario->setSenha("123");
$teste = LoginDal::login($usuario);
?>
