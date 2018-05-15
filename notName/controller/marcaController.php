<?php 
require_once '../dal/MarcaDAL.php';


$testando = MarcaDAL::buscaMarca();

echo $testando[1];
?>