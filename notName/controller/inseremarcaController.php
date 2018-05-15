<?php
require_once '../dal/MarcaDAL.php';

$nome = $_GET["name"];
$statusMar = $_GET["statusMar"];

if (isset($nome)) {
    
    if (isset($statusMar)) {
        
        $marca = new Marca();
        
        $marca->setDescMarca($nome);
        $marca->setStatusMarca($statusMar);
        
        if (! MarcaDAL::insereMarca($marca)) {
            echo "não funfou";
        }
        else
        {
            echo "funfou";
        }
    }
}
