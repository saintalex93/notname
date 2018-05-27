<?php
require_once '../dal/MarcaDAL.php';

$marca = new Marca();

$marca->setDescMarca($_GET['desc']);
$marca->setStatusMarca($_GET['status']);

$lastid = MarcaDAL::insereMarcaReturnID($marca);

    
echo $lastid;
